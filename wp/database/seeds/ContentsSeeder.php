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
    	$hamlet->save();
    }

    public function Pendragon()
    {
    	$pendragon = new \App\Content();
    	$mike = \App\User::find(2);
    	$pendragon->user_id = $mike->id;
    	$pendragon->title = 'Pendragon';
    	$pendragon->save();
    }

    public function HarryPotter()
    {
    	$harrypotter = new \App\Content();
    	$dev = \App\User::find(1);
    	$harrypotter->user_id = $dev->id;
    	$harrypotter->title = 'HarryPotter';
    	$harrypotter->save();
    }
}
