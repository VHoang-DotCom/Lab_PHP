<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public $fillable=([
        'productCode',
        'productName',
        'title',
        'description',
        'price',
        'discount',
        'quantity',
        'warranty',
        'createdBy',
        'categoryID'
    ]);
}
