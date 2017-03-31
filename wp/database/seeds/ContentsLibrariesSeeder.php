<?php

use Illuminate\Database\Seeder;

class ContentsLibrariesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->HamHarry();
        $this->Pendragon();
    }

    public function HamHarry()
    {
    	$lib1 = \App\Library::find(1);
    	$hamlet = \App\Content::find(1);
    	$harry = \App\Content::find(3);
    	$lib1->contents()->attach($harry);
    	$lib1->contents()->attach($hamlet);
    	$lib1->save();
    }

    // attaches interest fantasy to user mike
    public function Pendragon()
    {
    	$lib2 = \App\Library::find(2);
    	$pendragon = \App\Content::find(2);
    	$lib2->contents()->attach($pendragon);
    	$lib2->save();
    }
}
