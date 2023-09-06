<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Slider extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $primaryKey = 'id';
    public $sliderForeignKey = 'slider_id';
    public $translatedAttributes=["title","content","url"];

    protected $fillable = ["slider_type", "desktop", "tablet", "mobile", "video","order","status"];

    public $localeKey;

    public $translationModel;
}
