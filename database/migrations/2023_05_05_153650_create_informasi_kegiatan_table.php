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
        Schema::create('informasi_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->longText('info_kurikulum_2013')->nullable();
            $table->longText('info_kurikulum_ismubaistik')->nullable();
            $table->longText('info_ektrakurikuler')->nullable();
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
        Schema::dropIfExists('informasi_kegiatan');
    }
};
