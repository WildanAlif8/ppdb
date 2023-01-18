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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kelamin');
            $table->string('name');
            $table->string('asal_sekolah');
            $table->string('email')->unique();
            $table->string('nisn');
            $table->string('no_hp', 13)->unique();
            $table->string('no_hp_ayah', 13)->unique();
            $table->string('no_hp_ibu', 13)->unique();
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
        Schema::dropIfExists('pendaftarans');
    }
};