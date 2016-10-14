<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'title' => 'φάουλ (ικανότητα)',
            'SkillGroup' => 'ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ',
            'position_id' => '4'
        ]);

        DB::table('positions')->insert([
            'title' => 'μπλοκ στο σουτ',
            'SkillGroup' => 'ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ',
            'position_id' => '4'
        ]);

        DB::table('positions')->insert([
            'title' => 'έξοδος-επιστροφή δυνατή-αδύνατη πλευρά',
            'SkillGroup' => 'ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ',
            'position_id' => '4'
        ]);

        DB::table('positions')->insert([
            'title' => 'σωστό μαρκάρισμα του πίβοτ',
            'SkillGroup' => 'ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ',
            'position_id' => '4'
        ]);

        DB::table('positions')->insert([
            'title' => 'αποφυγή σκριν',
            'SkillGroup' => 'ΤΕΧΝΙΚΗ ΑΜΥΝΑΣ',
            'position_id' => '4'
        ]);
    }
}
