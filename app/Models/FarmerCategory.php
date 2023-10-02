<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'title_ne',
        'slug'
    ];
    public function officeCategory()
    {
        return $this->MorphMany(File::class, 'model');
    }
    public function farmerLists()
    {
        return $this->hasMany(FarmerList::class);
    }

}