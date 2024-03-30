<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;
    protected $table = 'payment_transaction';
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }
    public function paket()
    {
        return $this->belongsTo("App\Models\Paket", "paket_id", "id_paket");
    }
}
