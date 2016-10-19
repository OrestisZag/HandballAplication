<?php

use Illuminate\Database\Seeder;

class MatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 20;

        for($i = 0; $i < $limit; $i++) {
            DB::table('matches')->insert([
                'home' => $faker->company,
                'away' => $faker->company,
                'date' => $faker->date(),
                'comments' => ''
            ]);
        }
    }
}
