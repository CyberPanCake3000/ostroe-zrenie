<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsInfo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birth_date', 'OD_Sph', 'OD_Cyl', 'OD_ax', 'OS_Sph',
        'OS_Cyl', 'OS_ax', 'Dpp'];
}
