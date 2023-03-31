<?php

namespace App\Exports;


use App\Models\Hall;
use App\Models\Product;
use App\Models\Vendor;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductExport implements FromQuery, WithMapping, WithHeadings, WithColumnFormatting, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public $type;

    public function __construct($type)
    {

        $this->type = $type;
    }
    public function query()
    {
        return Product::query()
            ->when($this->type == 'in-stock', function ($q) {
                return $q->inStock();
            })
            ->when($this->type == 'out-of-stock', function ($q) {
                return $q->outOfStock();
            })
            ->with(['category', 'main_category']);
    }


    public function headings(): array
    {
        return [
            'Id',
            'Title In Arabic',
            'Title In English',
            'Main Category',
            'Sub Category',
            'Stock',
            'Purchase Price',
            'Real Price',
            'Fake Price',
            'Price With Taxes',
            'Profit Percent',
            'Views ',
            'Status',
            'Created At'
        ];
    }

    public function map($product): array
    {

        $mainCategory = $product->main_category ? $product->main_category->title_en . ' - ' . $product->main_category->title_ar : '-';
        $subCategory = $product->category ? $product->category->title_en . ' - ' . $product->category->title_ar : '-';


        return [

            $product->id,
            $product->title_ar,
            $product->title_en,
            $mainCategory,
            $subCategory,
            \number_format($product->stock),
            \number_format($product->purchase_price),
            \number_format($product->real_price),
            \number_format($product->fake_price),
            \number_format($product->price_after_taxes),
            $product->profit_percent . "%",
            \number_format($product->views),
            $product->status ? 'Active' : 'InActive',
            Date::dateTimeToExcel($product->created_at),

        ];
    }

    public function columnFormats(): array
    {
        return [
            'N' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [

            1 => ['font' => ['bold' => true]],
        ];
    }



}
