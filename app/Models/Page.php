<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Page extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public function template(){
        return $this->hasOne(Template::class,'id','template_id');
    }

    protected $primaryKey = 'id';
    public $productForeignKey = 'page_id';
    public $translatedAttributes=["locale","title","slug","page_title","brief","keywords","description","content"];
    protected $fillable = ["id","template_id","menu_id","image1","image2", "image3","order","status"];
    
    
    public $localeKey;

    public $translationModel;
}
