<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Integration::create([
            'name' => 'Google Recaptcha',
            'status' => 1,
            'config' =>json_encode([
                'version' => 'v2',
                'secret_key' => '6LdUDi0gAAAAAHAnN9oM8kG_WNmK7a2GkY7he2r8',
                'site_key'=>'6LdUDi0gAAAAADxnbC1YhNTLFBnkeY7oc15dVYGJ',
                'min_score'=>'0.3'
            ]),
        ]);

    }
}
