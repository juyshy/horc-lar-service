<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OcrData;

class Photo extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'filePath','notes','casetteNums',  'pagenum', 'pageOne', 'user_id', 'rotation'
    ];


    public function ocrData()
    {
        return $this->hasOne(OcrData::class);
    }

}
