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
        Schema::create('chips', function (Blueprint $table) {
            $table->id();
            $table->integer('code_money');
            $table->string('name_money');
            $table->integer('budget');
            $table->string('otherCode');
            $table->string('otherMoney');
            $table->string('otherBudget');
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
        Schema::dropIfExists('chips');
    }
};
