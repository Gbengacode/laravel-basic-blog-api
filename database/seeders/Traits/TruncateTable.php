<?php
 namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

 trait TruncateTable {
       protected function truncate($table_name){
           DB::table($table_name)->truncate();
       }
 }

?>