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
            'sortName' => 'LB',
            'fullName' => 'Left Back'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'RB',
            'fullName' => 'Right Back/Playmaker'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'CB',
            'fullName' => 'Center Back'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'HD',
            'fullName' => 'Half Defender'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'OD',
            'fullName' => 'Outside Defender'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'FD',
            'fullName' => 'Forward Defender'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'LW',
            'fullName' => 'Left Winger'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'RW',
            'fullName' => 'Right Winger'
        ]);

        DB::table('positions')->insert([
            'sortName' => 'CF',
            'fullName' => 'Center Forward/Pivot'
        ]);
    }
}
