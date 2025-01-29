<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddMarkupAndMarginToItemsTable extends Migration
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
                    'database.connections.tenant.database' => $tenant->database,  // Set the database dynamically
                ]);
                DB::reconnect('tenant');

                // Ensure the connection is using the correct database
                if (DB::connection('tenant')->getDatabaseName() !== $tenant->database) {
                   continue;
                }

                // Add the columns if they don't exist
                Schema::connection('tenant')->table('items', function (Blueprint $table) {
                    if (!Schema::connection('tenant')->hasColumn('items', 'markup')) {
                       $table->decimal('markup', 8, 2)->nullable()->after('item_description');
                    }
                    if (!Schema::connection('tenant')->hasColumn('items', 'margin')) {
                       $table->decimal('margin', 8, 2)->nullable()->after('markup');
                    }
                });

                DB::purge('tenant'); // Purge after migration for the tenant
            } else {
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
                    'database.connections.tenant.database' => $tenant->database,  // Set the database dynamically
                ]);
                DB::reconnect('tenant');

                // Ensure the connection is using the correct database
                if (DB::connection('tenant')->getDatabaseName() !== $tenant->database) {
                   continue;
                }

                // Remove the columns if they exist
                Schema::connection('tenant')->table('items', function (Blueprint $table) {
                    if (Schema::connection('tenant')->hasColumn('items', 'markup')) {
                       $table->dropColumn('markup');
                    }
                    if (Schema::connection('tenant')->hasColumn('items', 'margin')) {
                       $table->dropColumn('margin');
                    }
                });

                DB::purge('tenant'); // Purge after migration for the tenant
            } else {
           }
        }

   }
}
