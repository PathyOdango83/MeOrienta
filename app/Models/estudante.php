<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudante extends Model
{
    use HasFactory;
    
    
    protected $fillable=[nome,email,yearOld,adress,cpf,deficiencia,bairro,cep,nomeCurso,estado,escolaridade,institucao,dataInicio,dataFim,formacao,statusFormacao,image];
}
