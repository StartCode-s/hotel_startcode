<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;
use App\Models\{Order,Kamar,User};
use Illuminate\Support\Facades\Auth;
class CreateSnapTokenService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken()
    {



        $params = [
            'transaction_details' => [
                'order_id' => 1,
                'gross_amount' => $this->order->total_harga,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'name' => 'Ticket Check In Hotel | Kamar '.Kamar::where('id',$this->order->kamar_id)->first()->nama,
                    'price' => $this->order->total_harga,
                    'quantity' => 1,
                ],
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
