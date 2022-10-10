<?php

namespace App\Exports;

use App\Models\BusinessTrip\BusinessTrip;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BusinessTripExport implements FromCollection,WithHeadings,WithMapping,ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BusinessTrip::all();
    }
    public function map($business_trip): array
    {
        return [
            [
                $business_trip->trip_id ,
                $business_trip->employee_full_name,
                $business_trip->employee_position,
                $business_trip->trip_adress,
                $business_trip->trip_day_all,
                $business_trip->trip_begin_date,
                $business_trip->trip_end_date,
                $business_trip->order_date,
                $business_trip->order_number,
                $business_trip->shipping_adress,
                $business_trip->shipping_date,
                
                // Date::dateTimeToExcel($invoice->created_at),
            ],
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Familiya',
            'Lavozim',
            'Xizmat safari punkti',
            'Xizmat safari muddati',
            'Xizmat safarini boshlanish sanasi',
            'Xizmat safarini tugash sanasi',
            'Buyruq sanasi',
            'Buyruq raqami',
            'Jo‘nagan manzili',
            'Jo‘nagan sanasi'
        ];
    }
}
