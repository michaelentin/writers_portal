<?php

use Illuminate\Database\Seeder;

class TagsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->mikeHorror();
        $this->mikeFantasy();
    }

    // attaches interest horror to user mike
    public function mikeHorror()
    {
    	$mike = \App\User::find(2);
    	$horror = \App\Tag::find(1);
    	$mike->tags()->attach($horror);
    }

    // attaches interest fantasy to user mike
    public function mikeFantasy()
    {
    	$mike = \App\User::find(2);
    	$fantasy = \App\Tag::find(3);
    	$mike->tags()->attach($fantasy);
    }
}
