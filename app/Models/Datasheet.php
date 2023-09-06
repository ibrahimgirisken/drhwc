<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Datasheet extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    public function translationsData()
    {
        return $this->hasMany(DatasheetTranslation::class);
    }

    protected $primaryKey = 'id';
    protected $table = 'datasheets';
    public $translatedAttributes = ["productName", "content", "slug", "path"];
    protected $fillable = ["id","uniqId", "productCode", "image", "order", "status"];
    public $localeKey;

    public $translationModel;
}
