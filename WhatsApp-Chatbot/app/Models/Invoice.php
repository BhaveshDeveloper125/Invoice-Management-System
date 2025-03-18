<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{

    use SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'Invoice_ID',
        'Name',
        'Email',
        'Transaction_Date',
        'Birth_date',
        'Amount',
        'Status',
        'phone',
    ];
}
