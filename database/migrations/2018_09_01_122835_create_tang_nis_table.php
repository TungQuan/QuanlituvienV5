<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTangNisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TangNi', function (Blueprint $table) {
            $table->char('TangNiID',8);
            $table->string('PhapDanh',50);
            $table->integer('TuoiDao');
            $table->char('TuVienID',6);
            $table->char('GioiPhamID',2);
            $table->char('GiaoPhamID',2);
            $table->primary('TangNiID');
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
        Schema::dropIfExists('TangNi');
    }
}
