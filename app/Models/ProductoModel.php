<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen',
        'categoria_id'
    ];

    public function getProductosConCategoria()
    {
        return $this->select('productos.*, categorias.nombre as categoria')
                    ->join('categorias', 'categorias.id = productos.categoria_id')
                    ->findAll();
    }
}
