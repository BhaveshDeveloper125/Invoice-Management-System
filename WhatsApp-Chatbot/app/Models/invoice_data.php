<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invoice_data extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'phone', 'item1', 'item2'];
}
