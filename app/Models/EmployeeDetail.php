<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class EmployeeDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'position',
        'name',
        'name_ne',
        'post',
        'post_ne',
        'level',
        'level_ne',
        'contact',
        'email',
        'image',
        

    ];
    public function image(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Storage::disk('public')->url($value),
            set: fn($value) => $value->store('employee', 'public'),
        );
    }
}

