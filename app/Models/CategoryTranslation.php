<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;
    public function categories() {
        return $this->belongsTo(Product::class);
    }

    protected $fillable=[
        "locale",
        "title",
        "slug",
        "brief",
        "keywords",
        "description"
    ];
}
