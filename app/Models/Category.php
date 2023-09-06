<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    public function translationsData() {
        return $this->hasMany(CategoryTranslation::class);
    }

    protected $table = "categories";
    protected $primaryKey = 'id';
    public $productForeignKey = 'category_id';
    public $translatedAttributes=["locale","title","slug","brief","keywords","description"];

    protected $fillable = [
        'parent_id',
        'image1',
        'order',
        'status',
    ];

    public $localeKey;

    public $translationModel;
}
