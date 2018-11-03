<?php
namespace App\Library\Services;

use App\Library\Services\Contracts\NotificationServiceInterface;

  
class NotificationForUser implements NotificationServiceInterface
{
    public function printNotice()
    {
      return 'Welcome ' . auth()->user()->name . ' !';
    }
}

class NotificationForPost implements NotificationServiceInterface
{
    public function printNotice()
    {
      return 'Add a Post Successful !';
    }
}

class NotificationForOrder implements NotificationServiceInterface
{

	public function __construct($order) {
		$this->order = $order;
	}

    public function printNotice()
    {
      return 'Hello ' . $this->order->name . ' Shipped '. $this->order->item_count . ' order Successful !';
    }
}