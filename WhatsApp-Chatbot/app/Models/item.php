<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'items',
        'Design',
        'HSN',
        'MRP',
    ];
}
