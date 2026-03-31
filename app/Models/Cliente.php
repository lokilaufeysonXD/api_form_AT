<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes'; // para especificar la tabla y no haya problemas con el plural en larabel 

    protected $fillable = [
        'nombre_cliente',
        'numero_cliente'
    ];

    // relacion inversa
    public function actasEntrega()
    {
        return $this->hasMany(ActaEntrega::class, 'id_cliente');
    }
}
