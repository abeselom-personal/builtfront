<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    public function up()
    {
        // Get all tenant connections
        $tenants = DB::connection('landlord')->table('tenants')->get();

        foreach ($tenants as $tenant) {
            // Ensure tenant has a valid database name
            if (!empty($tenant->database)) {
                // Set the tenant connection dynamically
                DB::purge('tenant');
                config([
                    'database.connections.tenant.database' => $tenant->database,
                ]);
                DB::reconnect('tenant');

                // Ensure the connection is using the correct database
                if (DB::connection('tenant')->getDatabaseName() !== $tenant->database) {
                    continue;
                }

                // Create the types table if it doesn't exist
                if (!Schema::connection('tenant')->hasTable('types')) {
                    Schema::connection('tenant')->create('types', function (Blueprint $table) {
                        $table->id();
                        $table->string('name');
                        $table->timestamps();
                    });
                }

                // Add the foreign key column to items table if it doesn't exist
                Schema::connection('tenant')->table('items', function (Blueprint $table) {
                    if (!Schema::connection('tenant')->hasColumn('items', 'type_id')) {
                        $table->foreignId('type_id')->nullable()->constrained('types')->onDelete('set null')->after('type');
                    }
                });

                DB::purge('tenant'); // Purge after migration for the tenant
            }
        }
    }

    public function down()
    {
        $tenants = DB::connection('landlord')->table('tenants')->get();

        foreach ($tenants as $tenant) {
            // Ensure tenant has a valid database name
            if (!empty($tenant->database)) {
                // Set the tenant connection dynamically
                DB::purge('tenant');
                config([
                    'database.connections.tenant.database' => $tenant->database,
                ]);
                DB::reconnect('tenant');

                // Ensure the connection is using the correct database
                if (DB::connection('tenant')->getDatabaseName() !== $tenant->database) {
                    continue;
                }

                // Drop the foreign key and column from items table
                Schema::connection('tenant')->table('items', function (Blueprint $table) {
                    if (Schema::connection('tenant')->hasColumn('items', 'type_id')) {
                        $table->dropForeign(['type_id']);
                        $table->dropColumn('type_id');
                    }
                });

                // Drop the types table
                if (Schema::connection('tenant')->hasTable('types')) {
                    Schema::connection('tenant')->drop('types');
                }

                DB::purge('tenant'); // Purge after migration for the tenant
            }
        }
    }
}
