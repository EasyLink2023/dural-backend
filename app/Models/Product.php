<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'size_height' => 'array',
        'size_length' => 'array',
        'color' => 'array',
        'applications' => 'array',
        'features' => 'array',
        'benefits' => 'array',
        'package' => 'array',
    ];

    /**
     * Get the getCate that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
