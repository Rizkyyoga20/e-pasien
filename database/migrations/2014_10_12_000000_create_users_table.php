<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('no_ktp',16)->unique();
            $table->string('name');
            $table->enum('status_akses', ['Pasien', 'Admin', 'Dokter']);
            $table->string('password');
            $table->string('no_telepon');
            $table->string('email');
            $table->string('alamat');
            $table->string('usia');
            $table->string('status');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); 
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
