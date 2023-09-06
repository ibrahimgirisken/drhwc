<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use HasFactory, Translatable;


    public function translationsData()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    protected $primaryKey = 'id';
    public $productForeignKey = 'product_id';
    public $translatedAttributes = ["name", "slug", "title", "brief", "keywords", "description", "content"];
    protected $fillable = ["category_id", "code", "order", "status", "image1", "image2", "image3", "image3D", "created_at", "updated_at"];

    public $localeKey;

    public $translationModel;
}
