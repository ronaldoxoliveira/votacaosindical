<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicoe extends Model
{
    use HasFactory;

    protected $table = "instituicoes";
    protected $fillable = ['cnpj','nome_fantasia','razao_social','logradouro_inst','localidade_inst','bairro_inst','cep_inst','uf_inst','complemento_end_inst','tipo'];

    public function participantes()
    {
        return $this->hasMany(Participantes::class);
    }
}
