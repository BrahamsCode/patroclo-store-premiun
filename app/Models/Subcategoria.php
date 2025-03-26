<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $table = 'subcategorias';
    protected $primaryKey = 'id_subcategoria';
    public $timestamps = false;

    protected $fillable = [
        'id_categoria',
        'nombre',
        'imagen_url',
        'estado_auditoria',
        'fecha_creacion_auditoria'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_subcategoria', 'id_subcategoria');
    }
}
