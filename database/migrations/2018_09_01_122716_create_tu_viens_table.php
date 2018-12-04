<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TuVien', function (Blueprint $table) {
            $table->char('TuVienID',6);
            $table->string('TuVien_Ten',50);
            $table->char('TrangThaiID',2);
            $table->char('XaPhuongID',4);
            $table->primary('TuVienID');
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
        Schema::dropIfExists('TuVien');
    }
}
