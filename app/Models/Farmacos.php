<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmacos extends Model
{
    use HasFactory;

    protected $fillable = ['name','barcode','laboratory','price_per_box'];
}
