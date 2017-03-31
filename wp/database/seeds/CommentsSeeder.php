<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->goodBook();
    	$this->badBook();
    	$this->decent();
    }

    public function goodBook()
    {
    	$good = new \App\Comment();
    	$good->body = 'Great book my man, loved the read';
    	$good->user_id = 3; // commenter
    	$good->content_id = 2; // pendragon
    	$good->save();
    }

    public function badBook()
    {
    	$bad = new \App\Comment();
    	$bad->body = 'Terrible. Just awful. Bad plot, terrible character development';
    	$bad->user_id = 2; // mike
    	$bad->content_id = 3; // harry potter
    	$bad->save();
    }

    public function decent()
    {
    	$dec = new \App\Comment();
    	$dec->body = 'Not terrible, worth a good look over';
    	$dec->user_id = 3; // commenter
    	$dec->content_id = 3; // harry potter
    	$dec->save();
    }
}
