<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoicesData extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'item1',
        'item2',
        'media',
        'URL',
    ];
}
