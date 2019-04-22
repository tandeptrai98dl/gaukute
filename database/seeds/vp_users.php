<?php

use Illuminate\Database\Seeder;

class vp_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultUserData = [
            'user_name' => 'admin',
            'user_pass' => md5(123456)
        ];

        DB::table('vp-users')->insert($defaultUserData);

    }
}
