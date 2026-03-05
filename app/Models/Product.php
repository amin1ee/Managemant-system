<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'name',
        'price',
        'available',
        'quantity',
        'photo'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);

    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function reorder()
    {
        return $this->hasMany(Reorder::class);
    }

    public function stockStatus(): string
    {
        if ($this->quantity == 0) {
            return 'out_of_stock';
        }

        if ($this->quantity <= 10) {
            return 'low_stock';
        }

        return 'in_stock';
    }
}
