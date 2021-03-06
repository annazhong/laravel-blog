<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Order;
use Log;
use App\Task;

class SendOrderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $recipient = '1085177899@qq.com';

        // try {
        //     sleep(15);
        // } catch (\Exception $e){
        //     throw new \Exception("I am throwing this exception", 1);
        // };

        // //Mail::to($recipient)->send(new OrderShipped($this->order));
        // Log::info('Emailed order ' . $this->order->id);

            // Allow only 2 emails every 1 second
            Redis::throttle('my-mailtrap')->allow(2)->every(1)->then(function () {

            //Mail::to($recipient)->send(new OrderShipped($this->order));
            // Log::info('Emailed order ' . $this->order->id);

            $task = New Task();
        }, function () {
            // Could not obtain lock; this job will be re-queued
            return $this->release(2);
        });
    }
}