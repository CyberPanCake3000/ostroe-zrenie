<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;
use App\Models\ClientsInfo;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'glasses_model', 'comment'];


    public function getCustomer()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function getDate()
    {
        $date = date('d.m.Y h:m', strtotime($this->updated_at));
        return strval($date);
    }
}
