<?php

namespace App\Utilities;

class Constant
{
    const user_level_host = 0;
    const user_level_admin = 1;
    const user_level_client = 2;
    public static $user_level = [
        self::user_level_host => 'host',
        self::user_level_admin => 'admin',
        self::user_level_client => 'client',
    ];
    const order_status_unfinished=0;
    const order_status_finish=1;
    const order_status_shipping=2;
    const order_status_shipped=3;
    const order_status_completed=4;
    const order_status_cancel=5;

    public static $order_status =[
      self::order_status_unfinished=>'Unfinished' ,
      self::order_status_finish=>'Finish',
      self::order_status_shipping=>'Shipping',
      self::order_status_shipped=>'Shipped',
        self::order_status_completed=>'Completed',
        self::order_status_cancel=>'Cancel'
    ];
}
