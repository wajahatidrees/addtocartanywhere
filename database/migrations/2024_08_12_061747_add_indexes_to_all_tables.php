<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddIndexesToAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('enable_app');
            $table->index('created_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->index('name');
            $table->index('email_sent');
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->index('name');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropIndex('user_id');
            $table->dropIndex('enable_app');
            $table->dropIndex('created_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('name');
            $table->dropIndex('email_sent');
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->dropIndex('name');
        });

    }
    
        /**
     * Check if an index exists on a table.
     *
     * @param string $table
     * @param string $indexName
     * @return bool
     */
    protected function indexExists($table, $indexName)
    {
        $schemaManager = DB::getDoctrineSchemaManager();
        $indexes = $schemaManager->listTableIndexes($table);

        return array_key_exists($indexName, $indexes);
    }
}
