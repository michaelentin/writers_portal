<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->horror();
        $this->adventure();
        $this->fantasy();
    }

    public function horror()
    {
    	$tag = new \App\Tag();
    	$tag->name = 'Horror';
    	$tag->save();
    }

    public function adventure()
    {
    	$tag = new \App\Tag();
    	$tag->name = 'Adventure';
    	$tag->save();
    }

    public function fantasy()
    {
    	$tag = new \App\Tag();
    	$tag->name = 'Fantasy';
    	$tag->save();
    }
}
