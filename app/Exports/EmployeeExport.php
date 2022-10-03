<?php

namespace App\Exports;

use App\Models\Employee\Employee;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeeExport implements FromCollection,ShouldAutoSize
{
    use Exportable;

    private $fileName = 'employee.xlsx';
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::all();
    }
}
