<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTypeToItemsTable extends Migration
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

                // Add the column if it doesn't exist
                Schema::connection('tenant')->table('items', function (Blueprint $table) {
                    if (!Schema::connection('tenant')->hasColumn('items', 'type')) {
                        $table->string('type')->nullable()->after('margin');
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

                // Remove the column if it exists
                Schema::connection('tenant')->table('items', function (Blueprint $table) {
                    if (Schema::connection('tenant')->hasColumn('items', 'type')) {
                        $table->dropColumn('type');
                    }
                });

                DB::purge('tenant'); // Purge after migration for the tenant
            }
        }
    }
}
