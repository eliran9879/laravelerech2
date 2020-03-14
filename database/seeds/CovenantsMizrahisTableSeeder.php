<?php

use Illuminate\Database\Seeder;

class CovenantsMizrahisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('covenantsmizrahis')->insert(
            [
              [
               'bank_id' => '2',
               'designation' => 'discount',
               'total_month' => '4',
               'max_approval' => '5,000,000',
                'approval' => '50',
                'type_check' => 'salaried',
                'created_at' => date('Y-m-d G:i:s'),
               ],
              
            ]); 
    }
}
