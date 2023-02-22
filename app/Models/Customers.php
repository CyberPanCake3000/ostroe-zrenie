<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = ['phone_id', 'name', 'birth_date', 'OD_Sph', 'OD_Cyl', 'OD_ax', 'OS_Sph',
        'OS_Cyl', 'OS_ax', 'Dpp'];

    public function getOrders()
    {
        return $this->hasMany(Orders::class, 'customer_id', 'id');
    }

    public function getBirthDate()
    {
        $date = date('d.m.Y', strtotime($this->birth_date));
        return strval($date);
    }

    public function getPhoneNumber()
    {
        return $this->belongsTo(PhoneNumbers::class, 'phone_id', 'id');
    }
}
