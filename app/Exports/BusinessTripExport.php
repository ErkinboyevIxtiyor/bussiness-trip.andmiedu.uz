<?php

namespace App\Exports;

use App\Models\BusinessTrip\BusinessTrip;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BusinessTripExport implements FromCollection,ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BusinessTrip::all();
    }
}
