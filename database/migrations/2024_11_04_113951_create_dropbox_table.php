<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dropbox', function (Blueprint $table) {
            $table->bigIncrements('id_dropbox');
            $table->unsignedBigInteger('id_daerah');
            $table->string('nama_lokasi');
            $table->text('alamat');
            $table->boolean('status_dropbox');
            $table->integer('total_transaksi_dropbox')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diperbarui_pada')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_daerah')->references('id_daerah')->on('daerah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dropbox');
    }
};
