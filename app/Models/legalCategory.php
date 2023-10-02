<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class legalCategory extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'title_ne',
        'slug'

    ];

    public function legalLists()
    {
        return $this->hasMany(legalList::class);
    }
}
