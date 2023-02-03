<?php
namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait ForeignKeyConstraint {
    protected function disable_foreignkey () {
       DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
    protected function enable_foreignkey () {
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
     }
}


?>