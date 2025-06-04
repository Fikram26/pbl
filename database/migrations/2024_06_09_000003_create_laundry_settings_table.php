<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('laundry_settings', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pakaian');
            $table->string('bahan');
            $table->integer('timer_minutes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laundry_settings');
    }
}; 