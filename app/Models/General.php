<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;
    protected $fillable = ['id_selling', 'id_buylling','id_service'];

    public function sellings(){
        return $this->hasMany(Selling::class, 'id_selling');
    }
    public function services(){
        return $this->hasMany(Service::class, 'id_service');
    }
    public function buyllings(){
        return $this->hasMany(Buylling::class, 'id_buylling');
    }
}

