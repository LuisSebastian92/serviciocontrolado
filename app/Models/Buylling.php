<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buylling extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','price','description','image','id_general'];

    public function generals(){
        return $this->belongsTo(General::class, 'id_general');
    }
}
