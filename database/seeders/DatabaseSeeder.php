<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(LaratrustSeeder::class);

        DB::table('users')->insert([
            'firstname' => "Gerald",
            'lastname' => "Collins",
            'email' => "gerald.collins@newcom.com",
            'password' => Hash::make('password'),
        ]);

        DB::table('loan_statuses')->insert([
            'status' => "Open",
        ]);

        DB::table('interest_rates')->insert([
            'rate' => 0.25,
            'minimum' => 5000,
            'maximum' => 40000,
        ]);
    }
}
