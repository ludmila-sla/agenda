<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class agenda extends Model
{
    use HasFactory;
    protected $table = "agenda";
    protected $fillable = [
        'nome',
        'data',
        'inicio',
        'termino',
        'status',
        'obs',
        
        
    ];
    public function users() {
        return $this->belongsTo('App\Models\User');
    }
}
