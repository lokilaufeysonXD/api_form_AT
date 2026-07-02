<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActaEntrega;

class DescripcionMaterial extends Model
{
    protected $table = 'descripcion_material'; // para especificar la tabla y no haya problemas con el plural en larabel 
    
    protected $fillable = [
        'descripcion_texto',
        'numero_orden_produccion',
        'id_acta_entrega'

    ];

    // relación con ActaEntrega (pertenencia)
    public function actaEntrega()
    {
        return $this->belongsTo(ActaEntrega::class, 'id_acta_entrega');
    }
}
