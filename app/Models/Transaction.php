<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'user_id', 'day', 'month', 'amount', 'is_paid', 'date'];

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
