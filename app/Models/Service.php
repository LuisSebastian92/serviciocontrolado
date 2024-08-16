<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','phone','name_service','description','price','image','id_general'];

    public function generals(){
        return $this->belongsTo(General::class, 'id_general');
    }
}
