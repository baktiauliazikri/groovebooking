<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function pelanggan(){
        return $this-> belongsTo(User::class, 'nama_pelanggan');
    }
    public function barberman(){
        return $this-> belongsTo(User::class, 'barberman_id');
    }
    public function service(){
        return $this-> belongsTo(Service::class, 'service_id');
    }
}
