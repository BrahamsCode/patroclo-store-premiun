<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoImagen extends Model
{
    use HasFactory;

    protected $table = 'producto_imagenes';
    protected $primaryKey = 'id_producto_imagen';
    public $timestamps = false;

    protected $fillable = [
        'id_producto',
        'imagen_url',
        'estado_auditoria',
        'fecha_creacion_auditoria'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }
}
