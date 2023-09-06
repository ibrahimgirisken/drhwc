<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatasheetTranslation extends Model
{
    use HasFactory;
    public function datasheets()
    {
        return $this->belongsTo(Datasheet::class);
    }

    protected $fillable = [
        "locale",
        "productName",
        "content",
        "slug",
        "path"
    ];
}
