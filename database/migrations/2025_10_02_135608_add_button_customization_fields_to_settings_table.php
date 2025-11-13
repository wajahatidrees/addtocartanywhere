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
            $table->boolean('enable_animation_btn')->default(false)->after('custom_text_color');
            $table->boolean('show_button_hover')->default(false)->after('enable_animation_btn');
            $table->boolean('show_button_directly')->default(false)->nullable()->after('show_button_hover');

            $table->string('diff_buttonstyle')->nullable()->default('style1')->after('show_button_directly');

            $table->boolean('show_hide_sold_out_button')->default(false)->after('diff_buttonstyle'); // ✅ fixed
            $table->boolean('show_hide_un_var')->nullable()->after('show_hide_sold_out_button');     // ✅ fixed reference
            $table->string('btn_square_round')->nullable()->after('show_hide_un_var');
            $table->string('cart_button_style')->nullable()->after('select_button_style');
            $table->string('quantity_button_style')->nullable()->after('btn_square_round');
            $table->string('redirect_policy')->nullable()->after('quantity_button_style');
            $table->string('var_price_range')->nullable()->after('redirect_policy');             // ✅ string default
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'enable_ani_btn',
                'show_btn_hover',
                'show_btn_directly',
                'show_hide_sold_out_button', // ✅ corrected name
                'show_hide_un_var',
                'btn_square_round',
                'cart_button_style',
                'quantity_button_style',
                'redirect_policy',
                'var_price_range',
            ]);
        });
    }
};
