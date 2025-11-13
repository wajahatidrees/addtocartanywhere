<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('show_widget_home')->after('show_hide_button'); 
            $table->string('show_widget_collection')->after('show_hide_button');  
            $table->string('show_widget_result')->after('show_hide_button'); 
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
            $table->dropColumn('show_widget_home');
            $table->dropColumn('show_widget_collection');
            $table->dropColumn('show_widget_result');
        });
    }
}
