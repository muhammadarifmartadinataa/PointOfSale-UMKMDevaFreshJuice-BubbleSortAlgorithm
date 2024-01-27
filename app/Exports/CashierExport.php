<?php

namespace App\Exports;

use App\Models\Cashier;
use Maatwebsite\Excel\Concerns\FromCollection;

class CashierExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cashier::all();
    }
}
