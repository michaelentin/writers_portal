<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(TagsUsersSeeder::class);
        $this->call(ContentsSeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(LibrariesSeeder::class);
        $this->call(ContentsLibrariesSeeder::class);
    }
}
