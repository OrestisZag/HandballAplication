<?php

use Illuminate\Database\Seeder;

class campSeeder extends Seeder
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

        for ($i = 0; $i < $limit; $i++) {
            DB::table('camps')->insert([
                'title' => $faker->company,
                'place' => $faker->country,
                'date' => $faker->date()
            ]);
        }
    }
}
