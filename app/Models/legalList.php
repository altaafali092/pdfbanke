<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class legalList extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'title_ne',
        'slug',
        'status',
        'publisher',
        'publisher_ne',
        'publish_date',
        'legal_category_id'
    ];
    
    public function legalCategory()
    {
        return $this->belongsTo(legalCategory::class, 'legal_category_id');
    }
    public function files()
    {
        return $this->MorphMany(File::class,'model');
    }
}
