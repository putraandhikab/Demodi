<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspekProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospek_profiles', function (Blueprint $table) {
            $table->id('id');
            $table->string('id_profile', 6);
            $table->string('nama_profile');
            $table->string('nohp_profile');
            $table->string('alamat_profile');
            $table->double('longtitude');
            $table->double('latitude');
            $table->string('metode_pembelian');
            $table->string('kepemilikan_rumah');
            $table->string('akses_kendaraan');
            $table->date('tanggal_pengiriman');
            $table->string('ketersediaan_dana');
		    $table->string('booking_fee');
            $table->string('merk');
            $table->string('tipe');
            $table->string('down_payment');
            $table->string('tipe_asuransi');
            $table->double('diskon');
            $table->string('penawaran_lain');
		    $table->string('leasing')-> nullable();
            $table->date('kunjungan_selanjutnya');
            $table->string('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prospek_profiles');
    }
}
