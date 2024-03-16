<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortenedUrlsTable extends Migration
{
    public function up()
    {
        Schema::create('shortened_urls', function (Blueprint $table) {
            $table->id();
            $table->string('original_url');
            $table->string('short_url')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shortened_urls');
    }
}
