<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class po extends Model
{
    use HasFactory;

    protected $table = 'orderpo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'po_id',
        'date',
        'invoice_path',
     	'price',
     	'units', 
    ];
    public $timestamps = false;
}