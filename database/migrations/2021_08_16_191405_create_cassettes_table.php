<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCassettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cassettes', function (Blueprint $table) {
            $table->id();
            $table->string('hkinum')->nullable(); // sg num 
            $table->string('num')->nullable(); // orginal num
            $table->string('album')->nullable();
            $table->string('lenght')->nullable();
            $table->string('side_numberings')->nullable();
            $table->text('textoncasette')->nullable();
            $table->text('desc_notes')->nullable();
            $table->date('event_date')->nullable();
            $table->date('digitized_date', $precision = 0)->nullable();
            $table->boolean('borrow_copy_done')->nullable();
            $table->boolean('kof_only')->nullable();
            $table->string('audio_filename')->nullable();
            $table->integer('photo_id')->nullable();
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
        Schema::dropIfExists('cassettes');
    }
}
