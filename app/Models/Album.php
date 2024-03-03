<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'deskripsi', 'user_id'
    ];
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function foto()
    {
        return $this->hasMany(Foto::class);
    }
}
