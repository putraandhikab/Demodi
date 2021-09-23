<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('id');
            $table->string('id_sales', 6);
        	$table->string('nama_sales');
        	$table->string('username');
        	$table->string('password');
        	$table->string('no_hp');
        	$table->string('alamat_sales');
        	$table->string('email')->unique();
        	$table->string('bank');
        	$table->string('norek');
        	$table->integer('pendapatan');
            $table->string('foto');
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
        Schema::dropIfExists('sales');
    }
}
