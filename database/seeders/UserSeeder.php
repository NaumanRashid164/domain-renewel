<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $user = User::create([
                    'name' => 'admin',
                    'email' => 'admin@domain.com',
                    'email_verified_at' => '2021-02-07 17:00:00',
                    'password' => bcrypt('domain.com'),
                ]);
    }
}
