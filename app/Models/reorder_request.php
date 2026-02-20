<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reorder_request extends Model
{
    /** @use HasFactory<\Database\Factories\ReorderRequestFactory> */
    use HasFactory;
    protected $fillable = [
        'requested_quantity',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

