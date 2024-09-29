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
       if(!Schema::hasTable('time_attendance')){
        Schema::create('time_attendance', function(Blueprint $table){

            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->timestamp('time_in')->nullable()->index();
            $table->timestamp('time_out')->nullable()->index();
            $table->timestamps();

            //foregin key relationship

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_attendance');
    }
};
