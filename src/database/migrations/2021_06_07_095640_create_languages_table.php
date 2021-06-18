<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('code');
            $table->text('locale');
            $table->text('image');
            $table->text('sort_order');
            $table->boolean('state')->default(1);
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });

        DB::insert("INSERT INTO languages (name, code, locale, image, sort_order) VALUES ('English', 'en', 'en-US,en_US.UTF-8,en_US,en-gb,english', 'img/svg/flags/united-kingdom.svg',0);");
    }

    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
