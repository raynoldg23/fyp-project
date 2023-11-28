<?php

namespace App\Models;

use App\Models\StockImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';

    protected $fillable = [
        'customer_id',
        'name',
        'slug',
        'product',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',

    ];

    public function customer()
    {
        return $this->belongsTo(CustomerRecord::class, 'customer_id', 'id');
    }

    public function stockImages()
    {
        return $this->hasMany(stockImage::class, 'stock_id', 'id');
    }
}
