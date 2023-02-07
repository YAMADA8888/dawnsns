<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'HRI太郎',
                'mail' => 'taro@mail.com',
                'password' => Hash::make('taro22'),
                'created_at' => '2023-1-23 20:06:40',
                'updated_at' => '2023-1-23 20:06:40',
            ],
            [
                'username' => 'HRI次郎',
                'mail' => 'jiro@mail.com',
                'password' => Hash::make('jiro22'),
                'created_at' => '2023-1-23 20:06:40',
                'updated_at' => '2023-1-23 20:06:40',
            ],
            [
                'username' => 'HRI花子',
                'mail' => 'hanako@mail.com',
                'password' => Hash::make('hanako33'),
                'created_at' => '2023-1-23 20:06:40',
                'updated_at' => '2023-1-23 20:06:40',
            ],
        ]);
        //
    }
}
