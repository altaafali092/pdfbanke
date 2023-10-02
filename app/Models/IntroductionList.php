<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntroductionList extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable =[
        'title',
        'title_ne',
        'slug',
        'status',
        'introduction_category_id',
        'description',
        'description_ne',

    ];
    public function introductionCategory()
    {
        return $this->belongsTo(IntroductionCategory::class,'introduction_categroy_id');
    }
    public function files()
    {
        return $this->morphMany(File::class,'model');
    }
    
}
