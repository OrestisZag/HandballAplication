<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(athleteDataSeeder::class);
        $this->call(teamSeeder::class);
        $this->call(campSeeder::class);
        $this->call(positionSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(MatchesSeeder::class);
        $this->call(userSeeder::class);
    }
}
