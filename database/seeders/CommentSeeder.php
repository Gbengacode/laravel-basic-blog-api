<?php

namespace Database\Seeders;
use App\Models\Comment;
use Database\Seeders\Traits\ForeignKeyConstraint;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    use TruncateTable, ForeignKeyConstraint;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $this->disable_foreignkey();
        $this->truncate("comments");
        Comment::factory()->create();
        $this->enable_foreignkey();
    }
}
