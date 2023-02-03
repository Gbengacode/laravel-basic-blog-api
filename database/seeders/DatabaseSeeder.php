<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\ForeignKeyConstraint;

class DatabaseSeeder extends Seeder
{
    use TruncateTable,  ForeignKeyConstraint;
    /**
     * Seed the application's database.
     *
     * @return void
     */
   
    public function run()
    {    
         $this->call(UserSeeder::class);
         $this->call(PostSeeder::class);
         $this->call(CommentSeeder::class);
    }
}
