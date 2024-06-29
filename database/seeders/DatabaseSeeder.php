<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Merlin',
            'email' => 'merlin@gmail.com',
            'password' => bcrypt('123')
        ]);

        $this->call([
            WorkTypeSeeder::class,
            LandTypeSeeder::class,
            ThicknessTypeSeeder::class,
            RatioTypeSeeder::class,
            BrickworkSeeder::class,
            MixedTypeSeeder::class,
            ConcretingworkSeeder::class,
            SiteSeeder::class,
            CostTypeSeeder::class,
            EarthworkHeadSeeder::class,
            BrickworkHeadSeeder::class,
            ConcretingworkHeadSeeder::class,
            CementConcretingworkSeeder::class
        ]);
    }
}
