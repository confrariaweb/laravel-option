<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{

    public function up()
    {
        Schema::create('option_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('label');
            $table->string('name')->unique();
            $table->string('type')->default('text');
            $table->string('placeholder');
            $table->text('value')->nullable();
            $table->boolean('required')->default(false);
            $table->boolean('multiple')->default(false);
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('group_id')
                ->references('id')
                ->on('option_groups')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('options');
        Schema::dropIfExists('option_groups');
    }
}
