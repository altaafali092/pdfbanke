<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerList extends Model
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
    'farmer_category_id'
    ];
    public function farmerCategory()
    {
        return $this->belongsTo(FarmerCategory::class, 'farmer_category_id');
    }
    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }
}
