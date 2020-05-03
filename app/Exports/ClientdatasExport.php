<?php
  
namespace App\Exports;
  
use App\Clientdata;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class ClientdatasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Clientdata::all();
    }
}