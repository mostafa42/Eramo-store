<?php




namespace App\Exports;

use App\Models\Order;
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


class OrderExport implements FromQuery ,WithMapping,WithHeadings,WithColumnFormatting,WithStyles,ShouldAutoSize
{



    public $type;

    public function __construct($type){

        $this->type = $type;
    }
    public function query()
    {
        return Order::query()->with('country','country')->withCount('products')->whereStatus($this->type)
        ;
    }


    public function headings(): array
    {


        $fields = [
                'Id',
                'Order Number',
                'Price',
                'shipping',
                'Total Extra Fees',
                'Total Special Discount',
                'Promo Title',
                'Promo Discount',
                'Total Price ',
                'Customer Name',
                'Customer Email',
                'Customer Phone',
                'Country',
                'City',
                'Address',
                'Custom Address From Admin',
                'Comment',
                'Payment Type',
                'Order From',
                'Status',
            ];




            if($this->type =='inprogress'){
                $fields[] ='Inprogress At';

            }elseif($this->type =='delivered'){
                $fields[] ='Delivered At';
            }
            elseif ($this->type =='cancelled'){

                $fields[] ='Cancelled From';
                $fields[] ='Cancelled At';

            }

            $fields[] ='Created At';


            return $fields;

    }

    public function map($order): array
    {






        $data =[
            $order->id,
            $order->order_number,
            $order->total,
            $order->shipping,
            $order->total_extra_fees,
            $order->total_special_discount,
            $order->promo_code_title,
            $order->promo_discount,
            $order->total_sum,
            $order->customer_name,
            $order->customer_email,
            $order->customer_phone,
            $order->country ? $order->country->title_en . ' - ' .  $order->country->title_ar:'-',
            $order->city ? $order->city->title_en . ' - ' .  $order->city->title_ar:'-',
            $order->address_from_user,
            $order->custom_address_from_admin,
            $order->comment,
            $order->payment_type,
            $order->order_from,
            $order->status,

        ];


        if($this->type =='inprogress'){
            $data[] =$order->inprogress_at;

        }elseif($this->type =='delivered'){
            $data[] =$order->delivered_at;
        }
        elseif ($this->type =='cancelled'){

            $data[] =$order->cancelled_from;
            $data[] =$order->cancelled_at;

        }

        $data[] = $order->created_at;


        return $data;

    }

    public function columnFormats(): array
    {
        return [
            // 'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            // 'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,

        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [

            1  => ['font' => ['bold' => true]],
        ];
    }
}
















