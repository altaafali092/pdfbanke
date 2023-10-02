<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsCategory extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'title',
        'title_ne',
        'slug'
    ];  

    public function newsLists()
    {
        return $this->hasMany(NewsList::class);
    }
}
