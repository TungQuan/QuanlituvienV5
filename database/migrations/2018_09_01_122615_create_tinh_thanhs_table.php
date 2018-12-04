<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinhThanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TinhThanh', function (Blueprint $table) {
            $table->char('TinhThanhID',2);
            $table->string('TinhThanh_Ten',50);
            $table->unique('TinhThanh_Ten');
            $table->primary('TinhThanhID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TinhThanh');
    }
}
