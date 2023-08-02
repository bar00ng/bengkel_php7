<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookingDetail;
use App\Models\Testimoni;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'kd_booking',
        'nama_booking',
        'nomor_hp_booking',
        'email_booking',
        'status',
        'total_booking'
    ];

    public function bookingDetail() {
        return $this->hasMany(BookingDetail::class, 'kd_booking', 'kd_booking');
    }

    public function testimoni() {
        return $this->hasOne(Testimoni::class, 'kd_booking', 'kd_booking');
    }

    public static function generateKodeBooking() {
        $format = 'KD_%04d_%s';

        do {
            $randomNumber = mt_rand(1, 1000);
            $kodeBooking = sprintf($format, $randomNumber, date('dmy'));
        } while (self::where('kd_booking', $kodeBooking)->exists());

        return $kodeBooking;
    }
}
