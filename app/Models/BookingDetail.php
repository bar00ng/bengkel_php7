<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class BookingDetail extends Model
{
    protected $table = 'booking_detail';

    protected $fillable = [
        'kd_booking',
        'jasa_id',
    ];

    public function booking() {
        return $this->belongsTo(Booking::class, 'kd_booking', 'kd_booking');
    }

    public function jasa() {
        return $this->hasOne(Jasa::class, 'id', 'jasa_id');
    }
}
