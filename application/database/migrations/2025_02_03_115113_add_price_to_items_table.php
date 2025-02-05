<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPriceToItemsTable extends Migration
{
    public function up()
    {
        // Get all tenant connections
        $tenants = DB::connection('landlord')->table('tenants')->get();

        foreach ($tenants as $tenant) {
            if (!empty($tenant->database)) {
                DB::purge('tenant');
                config([
                    'database.connections.tenant.database' => $tenant->database,
                ]);
                DB::reconnect('tenant');

                if (DB::connection('tenant')->getDatabaseName() !== $tenant->database) {
                    continue;
                }

                Schema::connection('tenant')->table('items', function (Blueprint $table) {
                    if (!Schema::connection('tenant')->hasColumn('items', 'price')) {
                        $table->decimal('price', 10, 2)->nullable()->after('margin');
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
                config([
                    'database.connections.tenant.database' => $tenant->database,
                ]);
                DB::reconnect('tenant');

                if (DB::connection('tenant')->getDatabaseName() !== $tenant->database) {
                    continue;
                }

                Schema::connection('tenant')->table('items', function (Blueprint $table) {
                    if (Schema::connection('tenant')->hasColumn('items', 'price')) {
                        $table->dropColumn('price');
                    }
                });

                DB::purge('tenant');
            }
        }
    }
}
