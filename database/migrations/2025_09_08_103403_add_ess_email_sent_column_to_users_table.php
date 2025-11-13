<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
        public function up()
        {
                Schema::table('users', function (Blueprint $table) {
                    $table->boolean('ess_email_sent')->default(false)->after('email_sent');
                });
        }

    /**
     * Reverse the migrations.
     */
        public function down()
        {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('ess_email_sent');
            });
        }

};
