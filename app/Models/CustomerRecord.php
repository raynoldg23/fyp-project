<?php

namespace App\Models;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerRecord extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'age',
        'phoneNumber',
        'status',
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'customer_id', 'id');
    }

    public function customereyes()
    {
        return $this->hasMany(Eye::class, 'customer_id', 'id'); //bagi
        return $this->belongsTo(Eye::class, 'customereyes_id','id'); //ambil
    }

    
};
