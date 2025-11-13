<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddButtonColorToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('custom_puls_minus_color')->after('select_button_style'); 
            $table->string('custom_quantity_color')->after('custom_puls_minus_color');
            $table->string('custom_button_color')->after('select_button_style'); 
            $table->string('custom_text_color')->after('select_button_style');
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
            $table->string('custom_puls_minus_color'); 
            $table->string('custom_quantity_color');
            $table->string('custom_button_color'); 
            $table->string('custom_text_color');
        });
    }
}
