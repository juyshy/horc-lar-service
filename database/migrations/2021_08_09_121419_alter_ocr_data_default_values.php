<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOcrDataDefaultValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ocr_data', function (Blueprint $table) {
            $table->text('hocr')->default(NULL)->change();
            $table->text('ocr')->default(NULL)->change();
            $table->text('hocr_edited')->default(NULL)->change();
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
        });
    }
}
