<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periodo extends Model
{
    protected $fillable =[
        'inicio',
        'fin'
    ];
    use HasFactory;
}
