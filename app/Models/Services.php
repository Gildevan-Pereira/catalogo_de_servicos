<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;

    public function detalhes(){
        return $this->hasMany(Detalhes::class, 'id_services', 'id');
    }
}
