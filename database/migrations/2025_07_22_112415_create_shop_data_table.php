y<?php

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
       Schema::create('shop_data', function (Blueprint $table) {
           $table->id();
           $table->string('name')->nullable();
           $table->string('domain')->nullable();
           $table->string('email')->nullable();
           $table->string('shop_owner')->nullable();
           $table->string('phone')->nullable();
           $table->string('plan_display_name')->nullable();
           $table->string('address')->nullable();
           $table->string('country')->nullable();
           $table->string('theme_store_id')->nullable();
           $table->string('theme_name')->nullable();
           $table->enum('status', ['pending', 'in-progress', 'completed', 'failed'])->default('pending');
           $table->unsignedBigInteger('user_id');
           $table->timestamps();
       });
   }


   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
       Schema::dropIfExists('shop_data');
   }
};
