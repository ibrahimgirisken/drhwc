<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Module extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    protected $primaryKey = 'id';
    public $productForeignKey = 'module_id';
    public $translatedAttributes = ["locale","slug","title","content"];
    protected $fillable = ["template_up","template_down","image1","order","status"];

    public $localeKey;

    public $translationModel;
}
