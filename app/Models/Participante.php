<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;

    protected $table = "participantes";
    protected $fillable = ['instituicao_id','nome','cpf','datanasc','email','celular','tipo_participante','status_participante'];

    public function setDatanascAttribute($value){
        date('Y-m-d', strtotime($value));
    }

    public function getDatanascAttribute($value){
        date('d/m/Y', strtotime($value));
    }

    public function instituicoe()
    {
        return $this->belongsTo(Instituicoes::class);
    }
}
