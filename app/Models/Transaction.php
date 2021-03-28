<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'user_id', 'day', 'month', 'amount', 'is_paid', 'date'];

    public function is_paid_status(int $is_paid)
    {
        return $is_paid === 1 ? 'Lunas' : 'Belum Lunas';
    }
}
