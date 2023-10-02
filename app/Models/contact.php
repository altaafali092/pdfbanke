<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Mime\Email;

class contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'subject',
        'message'
    ];

}