<?php
   
namespace App\Imports;
   
use App\Clientdata;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
class ClientdatasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Clientdata([
            'client_id'     => $row['client_id'],
            'amount'    => $row['amount'], 
            'deposit_date' => $row['deposit_date'],
            'end_date' => $row['end_date'],
            'designation'     => $row['designation'],
            'type_check'     => $row['type_check'],
            'bank_id'     => $row['bank_id'],
            'status'     => $row['status'],
        ]);
    }
    
}