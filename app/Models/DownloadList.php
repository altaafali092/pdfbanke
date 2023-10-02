<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadList extends Model
{
    use HasFactory;
    protected $fillable=[

        'title',
        'title_ne',
        'slug',
        'status',
        'publisher',
        'publisher_ne',
        'publisher_date',
        'download_category_id'

    ];
    public function downloadCategory()
    {
        return $this->belongsTo(DownloadCategory::class, 'download_category_id');
    }
    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }

}
