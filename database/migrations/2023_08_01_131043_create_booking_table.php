<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->string('kd_booking')->primary();
            $table->string('nama_booking');
            $table->string('nomor_hp_booking');
            $table->string('email_booking');
            $table->enum('status', ['Belum Selesai', 'On Progress', 'Selesai'])->default('Belum Selesai');
            $table->foreignId('belongsTo')->references('id')->on('users')->onDelete('cascade');
            $table->string('warna_booking')->nullable();
            $table->string('kategori_booking')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
