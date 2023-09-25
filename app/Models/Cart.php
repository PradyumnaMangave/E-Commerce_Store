<?php

namespace App\Models;

class Cart
{

    public function centsToPrice($cents)
    {
        return number_format($cents / 100, 2);
    }

    public static function unitPrice($item)
    {
        return (new self)->centsToPrice($item['product']['price']) * $item['quantity'];
    }

    public static function totalAmount()
    {
        $total = 0;
        // Check if the 'cart' session variable exists and is an array
        if (session()->has('cart') && is_array(session('cart'))) {
            foreach (session('cart') as $item)
            {
                $total += self::unitPrice($item);
            }
        }
        return $total;
    }
}
