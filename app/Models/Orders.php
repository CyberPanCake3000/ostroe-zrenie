<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;
use App\Models\ClientsInfo;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'client_info_id', 'glasses_model', 'comment'];

    public function getClient()
    {
        return $this->belongsTo(Clients::class, 'client_id', 'id');
    }

    public function getClientInfo()
    {
        return $this->belongsTo(ClientsInfo::class, 'client_info_id', 'id');
    }

    public function getDate()
    {
        $date = date('d.m.Y h:m', strtotime($this->updated_at));
        return strval($date);
    }
}
