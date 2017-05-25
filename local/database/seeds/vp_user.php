<?php

use Illuminate\Database\Seeder;

class vp_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vp_user')->insert([
            'user_name' => 'admin1',
            'user_password' => '1234',
            'user_level' => '1',
        ]);
    }
}
