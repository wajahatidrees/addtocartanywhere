<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('button_customizations', function (Blueprint $table) {
            $table->id();
            $table->string('icon_button')->nullable(); // icon/button
            $table->string('selected_icon')->nullable();
            $table->string('custom_text')->default('Add to Cart');
            $table->string('text_color')->nullable();
            $table->string('background_color')->nullable();
            $table->string('quantity_button_style')->nullable();
            
            $table->boolean('quantity_button_enabled')->default(true);

            $table->string('button_style')->nullable(); // choose button style

            $table->string('inc_dec_color')->nullable();
            $table->string('inc_dec_background_color')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('button_customizations');
    }
};
