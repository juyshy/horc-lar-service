<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OcrData extends Model
{
    use HasFactory;

    protected $fillable = [
        'ocr', 'hocr','hocr_edited'
    ];
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
