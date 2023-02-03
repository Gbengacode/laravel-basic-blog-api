<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\ForeignKeyConstraint;
class UserSeeder extends Seeder
{

    use TruncateTable,  ForeignKeyConstraint;
    /**
     * 
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->disable_foreignkey();
        $this->truncate("users");
         User::factory(10)->create();
         $this->enable_foreignkey();
    }
}
