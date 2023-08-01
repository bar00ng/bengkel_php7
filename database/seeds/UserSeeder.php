<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'OWNER',
            'email' => 'owner@example.com',
            'password' => Hash::make('owner123')
        ])->attachRole('owner');

        User::create([
            'name' => 'MEKANIK',
            'email' => 'mekanik@example.com',
            'password' => Hash::make('mekanik123')
        ])->attachRole('mekanik');

        User::create([
            'name' => 'guest',
            'email' => 'guest@example.com',
            'password' => Hash::make('guest123')
        ])->attachRole('guest');
    }
}
