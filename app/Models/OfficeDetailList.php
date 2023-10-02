<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeDetailList extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'title_ne',
        'slug',
        'office_detail_id',
        'description',
        'description_ne',
        'status',
        'position'
    ];
    public function officeDetail()
    {
        return $this->belongsTo(OfficeDetail::class, 'office_detail_id');
    }
    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }
}
