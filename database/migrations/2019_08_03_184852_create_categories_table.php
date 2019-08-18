<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('categories')->insert([
            ['slug' => 'faculty',    'name' => 'Faculty'],
            ['slug' => 'events',     'name' => 'Events'],
            ['slug' => 'innovation', 'name' => 'Innovation'],
            ['slug' => 'alumi',      'name' => 'Alumni'],
            ['slug' => 'school-new', 'name' => 'School News'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
