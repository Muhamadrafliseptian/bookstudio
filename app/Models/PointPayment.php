<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointPayment extends Model
{
    use HasFactory;

    protected $table = "point_payment";

    protected $guarded = [''];

    public $timestamps = false;
}
