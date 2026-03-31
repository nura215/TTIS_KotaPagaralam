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
        Schema::create('aduan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tiket')->unique();
            $table->string('nama');
            $table->string('email');
            $table->string('nik', 16);
            $table->string('no_hp');
            $table->string('instansi');
            $table->string('kategori');
            $table->text('deskripsi');
            $table->string('file_nda');
            $table->string('file_poc');
            $table->string('status')->default('pending');
            $table->text('keterangan_admin')->nullable();
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
        Schema::dropIfExists('aduan');
    }
};
