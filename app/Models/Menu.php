<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Menu extends Model implements TranslatableContract
{
    use HasFactory, Translatable;


    public function menuWithPages()
    {
        return $this->hasMany(Page::class, 'parent_id', 'id');
    }

    public function page()
    {
        return $this->hasOne(PageTranslation::class, 'slug', 'slug');
    }

    public function getMenu()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id')->orderBy('order', 'asc');
    }

    protected $primaryKey = 'id';
    public $productForeignKey = 'menu_id';
    public $translatedAttributes = ["locale", "slug", "title", "page_title", "content"];
    protected $fillable = ["parent_id", "template_id", "order", "vitrin_status", "footer_status", "status"];

    public $localeKey;

    public $translationModel;
}
