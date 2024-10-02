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
        Schema::create('brings', function (Blueprint $table) {
            $table->id();
            $table->string('FullName')->comment('ชื่อผู้เบิก');
            $table->date('date_bring')->comment('วันที่เบิก');
            $table->longText('detail')->comment('รายละเอียด');
            $table->string('num_asset')->comment('หมายเลขครุภัณฑ์');
            $table->string('name_asset')->comment('ชื่อครุภัณฑ์');
            $table->double('per_price', 10, 2)->comment('ราคา/หน่วย');
            $table->string('num_sent')->comment('เลขที่ใบส่งของ');
            $table->date('Date_into')->comment('วันที่เข้าคลัง');
            $table->string('department')->comment('ฝ่ายที่เบิก');
            $table->string('other_department');
            $table->string('num_department')->comment('เลขประจำตำแหน่ง');
            $table->string('place')->comment('สถานที่ตั้งครุภัณฑ์');
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
        Schema::dropIfExists('brings');
    }
};
