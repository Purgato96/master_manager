<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CadEmp extends Model{

    protected $table = 'cad_emp';
    protected $primaryKey = 'id_emp';
    protected $fillable = [
        'nome_fantasia',
        'cnpj',
        'id_milvus',
        'team'
    ];
}
