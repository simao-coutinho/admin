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

        DB::insert("INSERT INTO languages SET  name = 'English', code = 'en', locale = 'en-US,en_US.UTF-8,en_US,en-gb,english',
                        image = '', sort_order = 0, state = 1, deleted = 0, created_at = NOW(), updated_at = NOW()");
    }

    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
