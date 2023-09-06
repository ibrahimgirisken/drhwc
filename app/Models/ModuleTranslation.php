<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleTranslation extends Model
{
    use HasFactory;
    protected $fillable=[
        "locale",
        "slug",
        "title",
        "content"
    ];
}
