<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'tracking_id',
        'company_name',
        'company_address',
        'from_country',
        'from_port',
        'destination_country',
        'destination_port',
        'container_id',
        'goods',
    ];

    public function from_c()
    {
        return $this->belongsTo(Country::class,'from_country','id');
    }
    public function destination_c()
    {
        return $this->belongsTo(Country::class,'destination_country','id');
    }

    public function from_p()
    {
        return $this->belongsTo(Port::class,'from_port','id');
    }
    public function destination_p()
    {
        return $this->belongsTo(Port::class,'destination_port','id');
    }

    public function container_info()
    {
        return $this->belongsTo(Container::class,'container_id','id');
    }
}
