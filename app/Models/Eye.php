<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eye extends Model
{
    use HasFactory;

    protected $table = 'customereyes';

    protected $fillable = [
        'customer_id',
        'sph',
        'cyl',
        'axis',
        'prism',
        'add',
        
    ];

    public function customer()
    {
        return $this->belongsTo(CustomerRecord::class, 'customer_id', 'id');
        return $this->hasMany(CustomerRecord::class, 'customereyes_id', 'id');
    }

}
