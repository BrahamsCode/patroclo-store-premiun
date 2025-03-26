<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';
    public $timestamps = false;

    protected $fillable = [
        'nombre_comercial',
        'tipo_documento',
        'numero_documento',
        'estado_auditoria',
        'fecha_creacion_auditoria'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_proveedor', 'id_proveedor');
    }
}
