<?php

use Illuminate\Database\Seeder;

class ContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->Hamlet();
        $this->Pendragon();
        $this->HarryPotter();
    }

    public function Hamlet()
    {
    	$hamlet = new \App\Content();
    	$mike = \App\User::find(2);
    	$hamlet->user_id = $mike->id;
    	$hamlet->title = 'Hamlet';
      $hamlet->summary = 'Hamlet is a play. It was written by Shakespeare and I wrote another version of it. COOL.';
      $hamlet->filename = 'Hamlet.pdf';
      $hamlet->save();
    }

    public function Pendragon()
    {
    	$pendragon = new \App\Content();
    	$mike = \App\User::find(2);
    	$pendragon->user_id = $mike->id;
    	$pendragon->title = 'Pendragon';
      $pendragon->summary = 'The first in the series of books about a time & space traveling boy named Bobby Pendragon';
      $pendragon->filename = 'Pendragon.pdf';
      $pendragon->save();
    }

    public function HarryPotter()
    {
    	$harrypotter = new \App\Content();
    	$dev = \App\User::find(1);
    	$harrypotter->user_id = $dev->id;
    	$harrypotter->title = 'HarryPotter';
      $harrypotter->summary = 'We all know what harry potter is about.';
      $harrypotter->filename = 'Harrypotter.pdf';
    	$harrypotter->save();
    }
}
