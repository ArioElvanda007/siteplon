<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('deskripsi_1',255);
            $table->string('deskripsi_2',255);
            $table->string('copyright',50);
            $table->string('nomor_telp',16);
            $table->string('email',50);
            $table->text('alamat');
            $table->text('map_lokasi');
            $table->text('gambar');
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
        Schema::dropIfExists('master_profiles');
    }
}
