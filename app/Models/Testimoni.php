<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\User;

class Testimoni extends Model
{
    protected $table = 'testimoni';

    protected $fillable =[
        'user_id',
        'kd_booking',
        'deskripsi_testimoni',
        'rating_testimoni',
        'file_testimoni'
    ];

    public function booking() {
        return $this->belongsTo(Booking::class, 'kd_booking', 'kd_booking');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
