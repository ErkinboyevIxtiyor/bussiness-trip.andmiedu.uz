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
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection,WithHeadings,WithMapping,ShouldAutoSize
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
    public function map($employee): array
    {
        return [
            [
                $employee->employee_id,
                $employee->second_name,
                $employee->first_name,
                $employee->third_name,
                $employee->employee_passport,
                $employee->employee_position,
                $employee->employee_gender,
                // Date::dateTimeToExcel($invoice->created_at),
            ],
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Familiya',
            'Ism',
            'Otasining ismi',
            'Passport',
            'Lavozim',
            'Jinsi',
        ];
    }
}
