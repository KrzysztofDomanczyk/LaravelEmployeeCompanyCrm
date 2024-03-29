<?php

use App\User;
use Illuminate\Database\Seeder;

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
            'name' => 'admin@admin.com',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $user = User::first();
        $user->createToken(Str::random(50));
    }
}
