<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
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

                // Ensure table doesn't exist before creating
                if (!Schema::connection('tenant')->hasTable('budgets')) {
                    Schema::connection('tenant')->create('budgets', function (Blueprint $table) {
                        $table->id();
                        $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
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

                Schema::connection('tenant')->dropIfExists('budgets');

                DB::purge('tenant');
            }
        }
    }
}
