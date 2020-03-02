<?php

use Illuminate\Database\Seeder;

class CovenantsIbisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('covenantsibis')->insert(
            [
              [
               'bank_id' => '3',
               'designation' => 'discount',
               'total_month' => '6',
               'total_amount' => '500,000',
               'approval' => '100',
               'max_percentage_general' => '0.8',
               'min_percentage_general' => '0.5',
               'created_at' => date('Y-m-d G:i:s'),
              ],
              [
                'bank_id' => '3',
                'designation' => 'loan',
                'total_month' => '12',
                'total_amount' => '500,000',
                'approval' => '100',
                'max_percentage_general' => '0.8',
                'min_percentage_general' => '0.35',
                'created_at' => date('Y-m-d G:i:s'),
               ],
               [
                'bank_id' => '3',
                'designation' => 'realestate',
                'total_month' => '12',
                'total_amount' => '1,250,000',
                'approval' => '100',
                'max_percentage_general' => '0.35',
                'min_percentage_general' => '0.15',
                'created_at' => date('Y-m-d G:i:s'),
               ],
            ]); 
    }
}
