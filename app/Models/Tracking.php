<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $table = 'trackings';

    protected $fillable = [
        'booking_id',
        'current_country',
        'current_port',
        'status',
    ];

    public function country_info()
    {
        return $this->belongsTo(Country::class,'current_country','id');
    }
    public function port_info()
    {
        return $this->belongsTo(Country::class,'current_port','id');
    }

}