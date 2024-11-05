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
        Schema::create('daerah', function (Blueprint $table) {
            $table->bigIncrements('id_daerah');
            $table->string('nama_daerah');
            $table->boolean('status_daerah');
            $table->integer('total_dropbox')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diupdate_pada')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daerah');
    }
};
