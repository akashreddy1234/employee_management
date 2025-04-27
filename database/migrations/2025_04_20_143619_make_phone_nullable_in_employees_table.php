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
        Schema::table('employees', function (Blueprint $table) {
            $table->string('phone')->nullable()->change(); // Make phone nullable
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('phone')->nullable(false)->change(); // Make phone non-nullable in case of rollback
        });
    }

};
