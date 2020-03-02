<?php
   
namespace App\Imports;
   
use App\Covenantsibi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
class CovenantsibisImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Covenantsibi([
            'bank_id'     => $row['bank_id'],
            'designation'    => $row['designation'], 
            'total_month' => $row['total_month'],
            'total_amount' => $row['total_amount'],
            'approval'     => $row['approval'],
            'max_percentage_general'     => $row['max_percentage_general'],
            'min_percentage_general'     => $row['min_percentage_general'],
        ]);
    }
    
}