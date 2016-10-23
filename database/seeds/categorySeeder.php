<?php

use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'K17'
        ]);

        DB::table('categories')->insert([
            'name' => 'Men'
        ]);

        DB::table('categories')->insert([
            'name' => 'U21'
        ]);
    }
}
