<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DescripcionMaterial extends Model
{
    protected $table = 'descripcion_material'; // para especificar la tabla y no haya problemas con el plural en larabel 
    
    protected $fillable = [
        'descripcion_texto',
        'numero_orden_produccion'
    ];

    // relacion inversa
    public function actasEntrega()
    {
        return $this->hasMany(ActaEntrega::class, 'id_descripcion_material');
    }
}
