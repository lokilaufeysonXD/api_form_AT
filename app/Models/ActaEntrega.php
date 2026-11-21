<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DescripcionMaterial;

class ActaEntrega extends Model
{
    protected $table = 'actas_entrega';

    protected $fillable = [
        'fecha_entrega',
        'id_cliente',
        'numero_orden_compra',
    ];

    // Relación con modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relación uno a muchos con DescripcionMaterial
    public function material()
    {
        return $this->hasMany(DescripcionMaterial::class, 'id_acta_entrega');
    }

    // Relación con DescripcionMaterial (uno a muchos)
    public function materiales()
    {
        return $this->hasMany(DescripcionMaterial::class, 'id_acta_entrega');
    }
}
