<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->dev();
        $this->mike();
        $this->commenter();
    }

    private function dev()
    {
    	$u =  new App\User();
    	$u->username = 'Developer';
    	$u->firstName = 'Dev';
    	$u->lastName = 'eloper';
    	$u->email = 'dev@gmail.com';
    	$u->password = bcrypt('password');
    	$u->save();
    };

    private function mike()
    {
        $u = new App\User();
        $u->username = 'mikey__bags';
        $u->firstName = 'Michael';
        $u->lastName = 'whatever';
        $u->email = 'mentin@iastate.edu';
        $u->password = bcrypt('password');
        $u->save();
    }

    private function commenter()
    {
        $u = new App\User();
        $u->username = 'commenter';
        $u->firstName = 'Comm';
        $u->lastName = 'Enter';
        $u->email = 'comment@er.edu';
        $u->password = bcrypt('comment');
        $u->save();
    }
}
