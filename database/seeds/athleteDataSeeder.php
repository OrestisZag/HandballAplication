<?php

use Illuminate\Database\Seeder;

class athleteDataSeeder extends Seeder
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
            DB::table('athlete_datas')->insert([
                'lastName' => $faker->lastName,
                'firstName' => $faker->firstNameMale,
                'birthday' => $faker->date(),
                'height' => $faker->randomFloat(1.50, 2.3),
                'weight' => $faker->randomFloat(50, 120.00),
                'telephone1' => $faker->unique()->phoneNumber,
                'telephone2' => $faker->unique()->phoneNumber,
                'fax' => $faker->unique()->phoneNumber,
                'teamFax' => $faker->unique()->phoneNumber,
                'email1' => $faker->unique()->email,
                'email2' => $faker->unique()->email,
                'country' => $faker->country,
                'region' => $faker->city,
                'address' => $faker->address,
                'postalCode' => $faker->postcode,
                'passportNumber' => $faker->creditCardNumber,
                'passportExpDate' => $faker->date(),
                'passportLastName' => $faker->lastName,
                'IDNumber' => $faker->ean8,
                'photo' => $faker->imageUrl(640, 480),
                'comments' => $faker->sentence(8, true)
            ]);
        }
    }
}
