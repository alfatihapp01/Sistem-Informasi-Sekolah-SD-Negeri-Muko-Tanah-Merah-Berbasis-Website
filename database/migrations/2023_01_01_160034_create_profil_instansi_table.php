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
        Schema::create('profil_instansi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instansi')->nullable();
            $table->string('npsn')->nullable();
            $table->string('akreditas')->nullable();
            $table->string('status')->nullable();
            $table->string('no_sk_pendirian')->nullable();
            $table->string('tanggal_sk_pendirian')->nullable();
            $table->string('no_sk_operasional')->nullable();
            $table->string('tanggal_sk_operasional')->nullable();
            $table->longText('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->longText('sejarah')->nullable();
            $table->longText('kata_sambutan')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telepon')->nullable();
            $table->string('web')->nullable();
            $table->string('logo')->nullable();
            $table->string('struktur_organisasi')->nullable();
            $table->string('kepala_instansi')->nullable();
            $table->string('nip')->nullable();
            $table->string('operator')->nullable();
            $table->longText('fasilitas')->nullable();
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
        Schema::dropIfExists('profil_instansi');
    }
};
