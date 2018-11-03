<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Order;
use App\Jobs\SendOrderEmail;

use Log;

class MailController extends Controller
{
    public function index() {

        $order = Order::findOrFail( rand(1,50) );

        // $recipient = '1085177899@qq.com';

        // Mail::to($recipient)->send(new OrderShipped($order));

        // return 'Sent order ' . $order->id;


        SendOrderEmail::dispatch($order);

        Log::info('Dispatched order ' . $order->id);
        return 'Dispatched order ' . $order->id;

    }
}