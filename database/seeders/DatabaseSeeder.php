<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Client;
use \App\Models\Zone;
use \App\Models\Employe;
use \App\Models\Agent;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User();
        $user->nom = 'John';
        $user->prenom = 'Doe';
        $user->date_naissance = '1990-01-01';
        $user->contact = '93561240';
        $user->profession = 'Développeur';
        $user->pays = 'France';
        $user->ville = 'Paris';
        $user->adresse = '123 Rue du Test';
        $user->carte = '1234567890123456';
        $user->email = 'john@example.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('password');
        $user->remember_token = Str::random(10);

        $user->save();

        Employe::create([
            'user_id' => $user->id,
            'status' => 'admin',
        ]);

        User::factory(500)->create();
        Zone::factory(10)->create();

        $users = User::query()->limit(250)->get();
        
        $users->each(function ($user){
            Client::factory()->create([
                'user_id' => $user->id,
                'zone_id' => null,
            ]);
        });

        $users = User::latest()->limit(250)->get();
        $users->each(function ($user){
            Employe::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
