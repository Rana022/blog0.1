<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('blog_name')->default('Blog06022');
            $table->string('welcome_speech')->default('Hello!welcome to');
            $table->mediumText('slogan');
            $table->string('address')->default('Dhamrai,Dhaka-180');
            $table->integer('contact');
            $table->string('email')->default('ghosh1706022gmail.com');
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
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
        Schema::dropIfExists('basics');
    }
}
