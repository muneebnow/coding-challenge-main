<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetworkConnection extends Model
{
    use HasFactory;

    protected $fillable=[
        'sender_id','receiver_id'
    ];
    public function User(){
        return $this->belongsTo(App\Models\User::class);
    }
}
