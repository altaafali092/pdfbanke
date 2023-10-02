<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'title_ne',
        'slug'
    ];
    public function officeDetail()
    {
        return $this->MorphMany(File::class,'model');
    }


    public function officeDetailList()
    {
        return $this->hasMany(OfficeDetailList::class);
    }
}
