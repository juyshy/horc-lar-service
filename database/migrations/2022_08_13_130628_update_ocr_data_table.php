<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOcrDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ocr_data', function (Blueprint $table) {
            //
            $table->longText('hocr')->change();
            $table->longText('hocr_edited')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ocr_data', function (Blueprint $table) {
            //
            $table->text('hocr')->change();
            $table->text('hocr_edited')->change();
        });
    }
}
