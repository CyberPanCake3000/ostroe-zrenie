<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumbers extends Model
{
    use HasFactory;

    protected $fillable = ['phone_number'];

    public function getCustomers()
    {
        return $this->hasMany(Customers::class, 'phone_id', 'id');
    }
}
