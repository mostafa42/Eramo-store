<?php




namespace App\Exports;

use App\Models\Shipping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class ShippingExport implements FromQuery ,WithMapping,WithHeadings,WithColumnFormatting,WithStyles,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Shipping::query()->with('city');
    }


    public function headings(): array
    {
        return [
            'Id',
            'Text In Arabic',
            'Text In English',
            'cost',
            'City',
            'Status',
            'Created At'
        ];
    }

    public function map($shipping): array
    {
         return[

            $shipping->id,
            $shipping->text_ar,
            $shipping->text_en,
            $shipping->cost,
            $shipping->city ? $shipping->city->title_en :'-',
            $shipping->status ?'Active':'InActive' ,
            Date::dateTimeToExcel($shipping->created_at),

         ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [

            1  => ['font' => ['bold' => true]],
        ];
    }
}
















