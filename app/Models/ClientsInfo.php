<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class ClientsInfo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birth_date', 'OD_Sph', 'OD_Cyl', 'OD_ax', 'OS_Sph',
        'OS_Cyl', 'OS_ax', 'Dpp'];

    public function getOrders()
    {
        return $this->hasMany(Orders::class, 'client_info_id', 'id');
    }

    public function getBirthDate()
    {
        $date = date('d.m.Y', strtotime($this->birth_date));
        return strval($date);
    }
}
