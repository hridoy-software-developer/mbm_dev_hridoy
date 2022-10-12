<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('en_GB');

        # admin
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => 'admin@mbmroup.com',
            'email_verified_at' => '',
            'password' => \Hash::make('password'),
            'remember_token' => '',
            'created_at' => date('Y-m-d h:s:i'),
            'updated_at' => date('Y-m-d h:s:i'),
        ]);

        for($i=0;$i<50;$i++){
            \App\Models\Post::create([
                'title' => $faker->realText($maxNbChars = 30, $indexSize = 2),
                'description' => $faker->sentence
            ]);
        }
    }
}
