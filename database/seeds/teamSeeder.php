<?php

use Illuminate\Database\Seeder;

class teamSeeder extends Seeder
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
            DB::table('teams')->insert([
                'name' => $faker->company,
                'level' => $faker->randomElement($array = array('a', 'b', 'c')),
                'place' => $faker->country,
                'telephone' => $faker->phoneNumber,
                'fax' => $faker->phoneNumber,
                'email' => $faker->email,
                'website' => $faker->url
            ]);
        }
    }
}
