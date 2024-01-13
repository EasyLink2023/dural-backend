<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'size_height' => 'array',
        'size_length' => 'array',
        'color' => 'array',
        'product_application' => 'array',
        'applications' => 'array',
        'features' => 'array',
        'benefits' => 'array',
        'package' => 'array',
    ];
}
