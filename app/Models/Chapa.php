<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapa extends Model
{
    use HasFactory;
    protected $table = "chapas";
    protected $fillable = ['eleicoe_id','nome','resenha','detalhamento'];

    public function eleicoe()
    {
        return $this->belongsTo(Eleicoe::class);
    }

}
