<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_ne',
        'image',
    ];

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Storage::disk('public')->url($value),
            set: fn($value) => $value->store('slider', 'public'),
        );
    }
}