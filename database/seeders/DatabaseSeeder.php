<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(5)->create();

        $user  = User::factory()->create([
            'name' => 'John Smith',
            'email' => 'john@example.com'
        ]);

        Job::factory(6)->create([
            'user_id' => $user->id
        ]);
    }
}
