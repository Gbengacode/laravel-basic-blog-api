<?php

namespace Database\Seeders;

use App\Models\Post;
use Database\Seeders\Traits\ForeignKeyConstraint;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use TruncateTable, ForeignKeyConstraint;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->disable_foreignkey();
        $this->truncate("posts");
        Post::factory(10)->create();
        $this->enable_foreignkey();
        
    }
}
