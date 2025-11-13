<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('variantSelectorBorderSize')->nullable()->after('show_widget_result');
            $table->string('redirectPolicy')->after('variantSelectorBorderSize'); 
            $table->string('variantSelectorBorderColor')->after('redirectPolicy');  
            $table->string('variantSelectorBorderRadius')->after('variantSelectorBorderColor');  
            $table->string('variantSelectorBackgroundColor')->after('variantSelectorBorderRadius');  
            $table->string('variantSelectorFontSize')->after('variantSelectorBackgroundColor');  
            $table->string('variantSelectorFontColor')->after('variantSelectorFontSize');  
            $table->string('variantSelectorFontStyle')->after('variantSelectorFontColor') ;  
            $table->string('variantSelectorFontFamily')->after('variantSelectorFontStyle')->nullable(); 
            $table->string('variantSelectorLabelFontSize')->after('variantSelectorFontFamily'); 
            $table->string('variantSelectorLabelFontColor')->after('variantSelectorLabelFontSize'); 
            
            
            $table->string('show_hide_sold_out_button')->default('0')->after('variantSelectorLabelFontColor'); 
            $table->string('soldOutButtonSize')->default('14px')->after('show_hide_sold_out_button'); 
            $table->string('soldOutSelectorButtonColor')->default('#A6A6A6')->after('soldOutButtonSize'); 
            $table->string('soldOutSelectorBorderRadius')->default('4px')->after('soldOutSelectorButtonColor'); 
            $table->string('soldOutSelectorBackgroundColor')->default('#3b2d1d')->after('soldOutSelectorBorderRadius'); 
            $table->string('soldOutSelectorFontSize')->default('13px')->after('soldOutSelectorBackgroundColor'); 
            $table->string('soldOutSelectorFontColor')->default('#FFFFFF')->after('soldOutSelectorFontSize'); 
            $table->string('soldOutSelectorFontStyle')->default('BOLD')->after('soldOutSelectorFontColor'); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

// Schema::table('settings', function (Blueprint $table) {
        //     $table->dropColumn('variantSelectorBorderSize');
        //     $table->dropColumn('variantSelectorBorderColor');
        //     $table->dropColumn('variantSelectorBorderRadius');
        //     $table->dropColumn('variantSelectorBackgroundColor');
        //     $table->dropColumn('variantSelectorFontSize');
        //     $table->dropColumn('variantSelectorFontColor');
        //     $table->dropColumn('variantSelectorFontStyle');
        //     $table->dropColumn('variantSelectorFontFamily');
        //     $table->dropColumn('variantSelectorLabelFontSize');
        //     $table->dropColumn('variantSelectorLabelFontColor');
        // });