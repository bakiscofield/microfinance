<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Client;
use \App\Models\Zone;
use \App\Models\Employe;
use \App\Models\Agent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1000)->create();
        Zone::factory(10)->create();

        $users = User::query()->limit(500)->get();
        

        $users->each(function ($user){
            Client::factory()->create([
                'user_id' => $user->id,
                'zone_id' => null,
            ]);
        });

        $users = User::latest()->limit(500)->get();
        $users->each(function ($user){
            Employe::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
