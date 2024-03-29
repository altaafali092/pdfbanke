<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_ne',
        'slug'
    ];

    public function downloadLists()
    {
        return $this->hasMany(DownloadList::class);
    }
}
