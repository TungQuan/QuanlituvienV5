<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXaPhuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('XaPhuong', function (Blueprint $table) {
          $table->char('XaPhuongID',4);
            $table->string('XaPhuong_Ten',30);
            $table->char('QuanHuyenID',2);
            $table->primary('XaPhuongID');
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
        Schema::dropIfExists('XaPhuong');
    }
}
