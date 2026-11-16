<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['phone' => '01000000000'],
            [
                'name' => 'Test User',
                'password' => 'password',
            ],
        );

        $missingUsers = 10 - User::count();

        if ($missingUsers > 0) {
            User::factory()
                ->count($missingUsers)
                ->create();
        }
    }
}
