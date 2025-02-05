<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBudgetItemsTable extends Migration
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
                if (!Schema::connection('tenant')->hasTable('budget_items')) {
                    Schema::connection('tenant')->create('budget_items', function (Blueprint $table) {
                        $table->id();
                        $table->foreignId('budget_id')->constrained('budgets')->onDelete('cascade');
                        $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
                        $table->decimal('markup', 8, 2)->nullable();
                        $table->decimal('margin', 8, 2)->nullable();
                        $table->decimal('cost', 15, 2)->nullable();
                        $table->timestamps();
                    });
                }

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

                Schema::connection('tenant')->dropIfExists('budget_items');

                DB::purge('tenant');
            }
        }
    }
}
