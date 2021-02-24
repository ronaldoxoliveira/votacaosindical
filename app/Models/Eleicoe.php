<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleicoe extends Model
{
    use HasFactory;

    protected $table = "eleicoes";
    protected $fillable = ['titulo','descricao','abertura','encerramento'];

    public function chapas()
    {
        return $this->hasMany(Chapa::class);

    }

}
