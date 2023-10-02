<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Coverslider extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
    ];
    public function image(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Storage::disk('public')->url($value),
            set: fn($value) => $value->store('coverslider', 'public'),
        );
    }
}
