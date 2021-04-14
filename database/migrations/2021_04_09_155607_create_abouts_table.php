<?php

use App\Models\About;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('email');
            $table->string('phone');
            $table->string('telephone')->nullable();
            $table->integer('experience');
            $table->string('country');
            $table->string('location')->nullable();
            $table->string('designation');
            $table->string('freelance')->nullable();
            $table->text('cover_letter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('cover_picture')->nullable();
            $table->string('image')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('resume')->nullable();
            $table->timestamps();
        });

        // create default one 
        $about = new About();
        $about->name = 'Jhon Doe';
        $about->age = 23;
        $about->email = 'info@gmail.com';
        $about->phone = '01763344401';
        $about->experience = '5';
        $about->country = 'Bangladesh';
        $about->designation = 'service holder';
        $about->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
