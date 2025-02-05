<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddCostToItemsTable extends Migration
{
    public function up()
    {
        $tenants = DB::connection('landlord')->table('tenants')->get();

        foreach ($tenants as $tenant) {
            if (!empty($tenant->database)) {
                DB::purge('tenant');
                config(['database.connections.tenant.database' => $tenant->database]);
                DB::reconnect('tenant');

                if (DB::connection('tenant')->getDatabaseName() !== $tenant->database) {
                    continue;
                }

                Schema::connection('tenant')->table('items', function (Blueprint $table) {
                    if (!Schema::connection('tenant')->hasColumn('items', 'cost')) {
                        $table->decimal('cost', 15, 2)->nullable()->after('margin');
                    }
                });

                DB::purge('tenant');
            }
        }
    }

    public function down()
    {
        $tenants = DB::connection('landlord')->table('tenants')->get();

        foreach ($tenants as $tenant) {
            if (!empty($tenant->database)) {
                DB::purge('tenant');
                config(['database.connections.tenant.database' => $tenant->database]);
                DB::reconnect('tenant');

                if (DB::connection('tenant')->getDatabaseName() !== $tenant->database) {
                    continue;
                }

                Schema::connection('tenant')->table('items', function (Blueprint $table) {
                    if (Schema::connection('tenant')->hasColumn('items', 'cost')) {
                        $table->dropColumn('cost');
                    }
                });

                DB::purge('tenant');
            }
        }
    }
}
