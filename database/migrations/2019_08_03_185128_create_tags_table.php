<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('tags')->insert([
        ['slug' => 'disgusting', 'name' => 'disgusting'],
        ['slug' => 'offend', 'name' => 'offend'],
        ['slug' => 'industry', 'name' => 'industry'],
        ['slug' => 'heavenly', 'name' => 'heavenly'],
        ['slug' => 'itch', 'name' => 'itch'],
        ['slug' => 'brass', 'name' => 'brass'],
        ['slug' => 'month', 'name' => 'month'],
        ['slug' => 'tease', 'name' => 'tease'],
        ['slug' => 'property', 'name' => 'property'],
        ['slug' => 'breath', 'name' => 'breath'],
        ['slug' => 'wiry', 'name' => 'wiry'],
        ['slug' => 'run', 'name' => 'run'],
        ['slug' => 'step', 'name' => 'step'],
        ['slug' => 'mere', 'name' => 'mere'],
        ['slug' => 'condition', 'name' => 'condition'],
        ['slug' => 'entertain', 'name' => 'entertain'],
        ['slug' => 'suggestion', 'name' => 'suggestion'],
        ['slug' => 'quirky', 'name' => 'quirky'],
        ['slug' => 'brother', 'name' => 'brother'],
        ['slug' => 'squash', 'name' => 'squash'],
        ['slug' => 'ignore', 'name' => 'ignore'],
        ['slug' => 'concentrate', 'name' => 'concentrate'],
        ['slug' => 'female', 'name' => 'female'],
        ['slug' => 'plant', 'name' => 'plant'],
        ['slug' => 'sick', 'name' => 'sick'],
        ['slug' => 'discovery', 'name' => 'discovery'],
        ['slug' => 'abusive', 'name' => 'abusive'],
        ['slug' => 'unique', 'name' => 'unique'],
        ['slug' => 'actor', 'name' => 'actor'],
        ['slug' => 'disapprove', 'name' => 'disapprove'],
        ['slug' => 'earn', 'name' => 'earn'],
        ['slug' => 'letter', 'name' => 'letter'],
        ['slug' => 'country', 'name' => 'country'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
