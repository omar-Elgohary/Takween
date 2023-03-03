<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->foreignId("freelancer_id")->references('id')->on('users')->cascadeOnDelete();
            $table->enum('status',['pending','active','reject'])->default('pending');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offers', function (Blueprint $table) {
            Schema::dropColumn('freelancer_id');
            Schema::dropColumn('status');
        });
    }
};
