<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class NewsList extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'title_ne',
        'slug',
        'status',
        'publisher',
        'publisher_ne',
        'publish_date',
        'news_category_id'
    ];
    public function newsCategory()
    {
        return $this->belongsTo(newsCategory::class, 'news_category_id');

    }
    public function files()
    {
        return $this->MorphMany(File::class,'model');
    }
}
