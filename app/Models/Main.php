<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Main extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    protected $primaryKey = 'id';
    public $mainForeignKey = 'main_id';
    public $translatedAttributes = ["locale","slug","title","content","brief"];
    protected $fillable=["image","order","status"];

    public $localeKey;

    public $translationModel;
}
