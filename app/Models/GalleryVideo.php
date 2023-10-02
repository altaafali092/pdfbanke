<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryVideo extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'title_ne',
        'slug',
        'url',
    ];
    public function files()
    {
        return $this->MorphMany(File::class,'model');
    }
    
}
