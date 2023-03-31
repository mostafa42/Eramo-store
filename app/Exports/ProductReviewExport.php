<?php




namespace App\Exports;

use App\Models\ProductReview;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductReviewExport implements FromQuery ,WithMapping,WithHeadings,WithColumnFormatting,WithStyles,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return ProductReview::query()->with(['user','product']);
    }


    public function headings(): array
    {
        return [
            'Id',
            'Title',
            'Review',
            'Rating',
            'Approved',
            'User',
            'Product',
            'Created At'
        ];
    }

    public function map($review): array
    {
         return[

            $review->id,
            $review->title,
            $review->review,
            $review->rating,
            $review->approved ?'Approved':'Not Approved' ,
            $review->user ? $review->user->name . ' - ' . $review->user->email :'-',
            $review->product ? $review->product->title_en . ' - ' . $review->product->title_ar :'-',
            Date::dateTimeToExcel($review->created_at),

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
















