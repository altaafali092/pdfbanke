<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OfficeSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'office_name',
        'office_name_ne',
        'office_add',
        'office_add_ne',
        'phone',
        'email',
        'cover',
        'logo1',
        'logo2',
        'adphoto',
        'office_cheif_id',
        'information_officer_id',
        'mapurl',
        'fburl',
        'twitterurl',
    ];
    protected function cover(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Storage::disk('public')->url($value),
            set: fn($value) => $value->store('cover', 'public'),
        );
    }
    protected function logo1(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Storage::disk('public')->url($value),
            set: fn($value) => $value->store('setting', 'public'),
        );
    }
    protected function logo2(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Storage::disk('public')->url($value),
            set: fn($value) => $value->store('setting', 'public'),
        );
    }
    protected function adPhoto(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Storage::disk('public')->url($value),
            set: fn($value) => $value->store('setting', 'public'),
        );
    }
    public function officeCheifId()
    {
        return $this->belongsTo(EmployeeDetail::class, 'office_cheif_id');
    }
    public function informationOfficerId()
    {
        return $this->belongsTo(EmployeeDetail::class, 'information_officer_id');
    }

}