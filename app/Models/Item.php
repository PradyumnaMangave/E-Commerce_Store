<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        $this->belongsTo(Product::class);
    }

    public function orders()
    {
        $this->belongsTo(Order::class);
    }

    public function color()
    {
        $this->belongsTo(Color::class);
    }
}
