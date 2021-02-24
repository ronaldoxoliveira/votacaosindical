<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

    protected $table = "votos";
    protected $fillable = ['participante_id','chapa_id','audita'];

    public function participante()
    {
        return $this->belongsTo(Participante::class);
    }
    public function chapa()
    {
        return $this->belongsTo(Chapa::class);
    }

}
