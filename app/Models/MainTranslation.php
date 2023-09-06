<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainTranslation extends Model
{
    use HasFactory;
    protected $fillable=[
        "locale",
        "slug",
        "title",
        "content",
        "brief"
    ];
}
