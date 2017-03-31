<?php

use Illuminate\Database\Seeder;

class LibrariesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->commenters();
        $this->devs();
    }

    public function commenters()
    {
    	$lib = new \App\Library();
    	$lib->user_id = 3; // commenter
    	$lib->save();
    }

    public function devs()
    {
    	$lib = new \App\Library();
    	$lib->user_id = 1; // dev
    	$lib->save();
    }
}
