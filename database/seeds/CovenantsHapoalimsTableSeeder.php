<?php

use Illuminate\Database\Seeder;

class CovenantsHapoalimsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('covenantshapoalims')->insert(
            [
              [
               'bank_id' => '1',
               'designation' => 'discount',
               'total_month' => '6',
               'max_approval' => '0.05',
               'approval' => '70',
               'type_check' => 'salaried',
               'created_at' => date('Y-m-d G:i:s'),
              ],
              [
                'bank_id' => '1',
                'designation' => 'discount',
                'total_month' => '12',
                'max_approval' => '0.05',
                'approval' => '50',
                'type_check' => 'salaried',
                'created_at' => date('Y-m-d G:i:s'),
               ],
               [
                'bank_id' => '1',
                'designation' => 'loan',
                'total_month' => '6',
                'max_approval' => '0.05',
                'approval' => '70',
                'type_check' => 'salaried',
                'created_at' => date('Y-m-d G:i:s'),
               ],
               [
                'bank_id' => '1',
                'designation' => 'loan',
                'total_month' => '12',
                'max_approval' => '0.05',
                'approval' => '50',
                'type_check' => 'salaried',
                'created_at' => date('Y-m-d G:i:s'),
               ],
            ]); 
    
    }
}
