<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_peminjam')->unsigned();
            $table->foreign('id_peminjam')->references('id')->on('users');
            $table->bigInteger('id_buku')->unsigned();
            $table->foreign('id_buku')->references('id')->on('book');
            $table->enum('status', ['pinjam', 'kembali']);
            $table->integer('jumlah');
            $table->date('tanggal_ambil');
            $table->date('tanggal_kembali')->nullable();
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
        Schema::dropIfExists('book_logs');
    }
}
