<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActaEntrega extends Model
{
    protected $table = 'actas_entrega';

    protected $fillable = [
        'fecha_entrega',
        'id_cliente',
        'numero_orden_compra',
        'id_orden_produccion',
    ];

    // relacion con modelo cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // relacion con modelo DescripcionMaterial
    public function material()
    {
        return $this->belongsTo(DescripcionMaterial::class, 'id_orden_produccion');
    }
}
