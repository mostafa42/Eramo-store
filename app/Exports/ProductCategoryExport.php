<?php




namespace App\Exports;

use App\Models\ProductCategory;
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


class ProductCategoryExport implements FromQuery ,WithMapping,WithHeadings,WithColumnFormatting,WithStyles,ShouldAutoSize
{



    public $type;

    public function __construct($type){

        $this->type = $type;
    }
    public function query()
    {
        return ProductCategory::query()->with('parent')->when($this->type=='sub' ,function($q ) {
            return $q->sub();
        })
        ->when($this->type=='main' ,function($q ) {
            return $q->main();
        });
    }


    public function headings(): array
    {

        if($this->type=='sub' ){

            return [
                'Id',
                'Text In Arabic',
                'Text In English',
                'Type',
                'Main Category',
                'Status',
                'Created At'
            ];
        }
        return [
            'Id',
            'Text In Arabic',
            'Text In English',
            'Type',
            'Status',
            'Created At'
        ];
    }

    public function map($category): array
    {

        if($this->type=='sub' ){
            return[

                $category->id,
                $category->title_ar,
                $category->title_en,
                $category->type,
                $category->parent ? $category->parent->title_en .' - ' .$category->parent->title_ar:'-',
                $category->status ?'Active':'InActive' ,
                Date::dateTimeToExcel($category->created_at),

             ];
        }
         return[
            $category->id,
            $category->title_ar,
            $category->title_en,
            $category->type,
            $category->status ?'Active':'InActive' ,
            Date::dateTimeToExcel($category->created_at),

         ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,

            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,

        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [

            1  => ['font' => ['bold' => true]],
        ];
    }
}
















