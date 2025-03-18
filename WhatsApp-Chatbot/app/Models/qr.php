<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qr extends Model
{
    protected $fillable = [
        'item',
        'design_no',
        'hsn',
        'mrp',
        'QR',
    ];
}
