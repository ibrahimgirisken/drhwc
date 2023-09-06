<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory;

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public $timestamps = false;
    protected $fillable=[
        "product_id",
        "locale",
        "name",
        "slug",
        "title",
        "brief",
        "keywords",
        "description",
        "content"
    ];
}
