<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Admin();
        $a->name = "admin";
        $a->password = bcrypt('admin');
        $a->save();
    }
}
