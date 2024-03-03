<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul','deskripsi','lokasi','album_id','user_id',
    ];
function album(){
        return $this->belongsTo(Album::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
    function like(){
        return $this->hasMany(Like::class);
    }
    function komen(){
        return $this->hasMany(Komen::class);
    }
}
