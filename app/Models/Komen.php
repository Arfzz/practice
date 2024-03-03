<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto_id','user_id','isi_komen',
    ];
    function user(){
        return $this->belongsTo(User::class);
    }
    function foto(){
        return $this->belongsTo(Foto::class);
    }
}
