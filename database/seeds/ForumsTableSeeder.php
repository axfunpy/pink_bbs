<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class ForumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('forums')->insert([
        	'name' => '种花区',
        	'content' => '来一起种花吧！',
        	'admin_name' => '花农N号',
        ]);
    }
}
