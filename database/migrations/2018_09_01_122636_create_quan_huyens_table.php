<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuanHuyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QuanHuyen', function (Blueprint $table) {
            $table->char('QuanHuyenID',2);
            $table->string('QuanHuyen_Ten',50);
            $table->char('TinhThanhID',2);
            $table->primary('QuanHuyenID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('QuanHuyen');
    }
}
