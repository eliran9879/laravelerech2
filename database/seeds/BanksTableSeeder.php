<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert(
            [
              [
               'name' => 'BankHapoalim',
               'created_at' => date('Y-m-d G:i:s'),
              ],
              [
                'name' => 'BankMizrahi',
                'created_at' => date('Y-m-d G:i:s'),
               ],
               [
                'name' => 'Ibi',
                'created_at' => date('Y-m-d G:i:s'),
               ],
            ]);   
    }
}
