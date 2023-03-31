<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AdminExport implements FromQuery,
WithMapping,
WithHeadings ,
WithColumnFormatting,
ShouldAutoSize,
WithStyles

{


    public function query()
    {
        return Admin::query()->with(['roles']);
    }



    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'phone',
            'Status',
            'Role',
            'Gender',
            'Created At'
        ];
    }

    public function map($admin): array
    {
         return[

            $admin->id,
            $admin->name,
            $admin->email,
            $admin->phone,
            $admin->status ?'Active':'InActive' ,

            $admin->roles ? $admin->roles[0]->name :'-',
            $admin->gender,

            Date::dateTimeToExcel($admin->created_at),

         ];
    }


    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [

            1  => ['font' => ['bold' => true]],

        ];
    }




}
