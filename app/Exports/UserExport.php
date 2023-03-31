<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UserExport implements FromQuery,
WithMapping,
WithHeadings ,
WithColumnFormatting,
ShouldAutoSize,
WithStyles
{
    public function query()
    {
        return User::query()->with(['city','country'])  ->orderBy('created_at');
    }



    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'phone',
            'Status',
            'Country',
            'City',
            'Gender',
            'Sign Up From',
            'Created At'
        ];
    }

    public function map($user): array
    {
         return[

            $user->id,
            $user->name,
            $user->email,
            $user->phone,
            $user->status ?'Active':'InActive' ,
            $user->country ? $user->country->title_en :'-',
            $user->city ? $user->city->title_en :'-',
            $user->gender,
            $user->sign_from,
            Date::dateTimeToExcel($user->created_at),

         ];
    }


    public function columnFormats(): array
    {
        return [
            'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [

            1  => ['font' => ['bold' => true]],

        ];
    }


}
