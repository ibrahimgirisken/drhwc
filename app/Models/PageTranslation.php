<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    use HasFactory;

    public function page() {
        return $this->belongsTo(Page::class);
    }
    

     protected $fillable=[
        "locale",
        "title",
        "slug",
        "page_title",
        "brief",
        "keywords",
        "description",
        "content",
        "menu_id"
    ];

}
