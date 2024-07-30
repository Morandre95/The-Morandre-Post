<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'message', 'name', 'email',
    ];
}
