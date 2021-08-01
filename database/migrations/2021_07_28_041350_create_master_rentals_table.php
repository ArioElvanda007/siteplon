<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_rentals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rental', 255);
            $table->string('nomor_telp', 16);
            $table->string('kota', 255);
            $table->text('alamat');
            $table->string('email', 30);
            $table->string('website', 255);
            $table->text('map_lokasi');
            $table->text('gambar');
            $table->string('status_best', 1);
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
        Schema::dropIfExists('master_rentals');
    }
}
