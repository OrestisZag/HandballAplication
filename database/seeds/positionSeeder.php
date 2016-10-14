<?php

use Illuminate\Database\Seeder;

class positionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'sortName' => 'GK',
            'fullName' => 'Goalkeeper'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'LE',
            'fullName' => 'Left Extrem'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'RE',
            'fullName' => 'Right Extrem'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'LI',
            'fullName' => 'Left Inter'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'RI',
            'fullName' => 'Right Inter'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'PV',
            'fullName' => 'Pivot'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'PM',
            'fullName' => 'Play Maker'
        ]);
    }
}
