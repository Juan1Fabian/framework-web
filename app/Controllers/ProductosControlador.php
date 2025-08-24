<?php
namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel; 

class ProductosControlador extends BaseController
{
    public function index()
    {
        $productoModel = new ProductoModel();
        $datos['productos'] = $productoModel->getProductosConCategoria();

        $datos['header'] = view('layout/header');
        $datos['footer'] = view('layout/footer');


        return view('productos/listar', $datos);
    }

    public function crear()
    {
        $categoriaModel = new CategoriaModel();
        $datos['categorias'] = $categoriaModel->findAll();

        $datos['header'] = view('layout/header');
        $datos['footer'] = view('layout/footer');

        return view('productos/crear', $datos);
    }

    public function guardar()
    {
        $productoModel = new ProductoModel();

        $nombre = $this->request->getVar('nombre');
        $descripcion = $this->request->getVar('descripcion');
        $precio = $this->request->getVar('precio');
        $stock = $this->request->getVar('stock');
        $categoria = $this->request->getVar('categoria');

        if ($imagen = $this->request->getFile('imagen')) {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('../public/uploads/', $nuevoNombre);

            $Registro = [
                'nombre'       => $nombre,
                'descripcion'  => $descripcion,
                'precio'       => $precio,
                'imagen'       => $nuevoNombre,
                'stock'        => $stock,
                'categoria_id' => $categoria 
            ];

            $productoModel->insert($Registro);

            return $this->response->redirect(base_url('productos'));
        }
    }

    public function eliminar($id = null)
    {
    $productoModel = new ProductoModel();

    $datosProducto = $productoModel->where('id', $id)->first();
    $rutaImagen = '../public/uploads/' . $datosProducto['imagen'];

    if (file_exists($rutaImagen)){ unlink($rutaImagen); }

    $productoModel->where('id', $id)->delete($id);

    return $this->response->redirect(base_url('productos'));
    }

    public function editar($id = null)
    {
    $producto = new ProductoModel();
    $categoria = new CategoriaModel();

    $datos['header'] = view('Layout/header');
    $datos['footer'] = view('Layout/footer');
    $result = $producto->where('id', $id)->first();

    if (!$result) { 
        return $this->response->redirect(base_url('productos'));
        } else {
            $datos['producto'] = $result;
            $datos['categorias'] = $categoria->findAll();

            return view('productos/editar', $datos);
        }
    } 
    
    public function actualizar()
    {
        $productoModel = new ProductoModel();

        // 1. Obtener datos del formulario
        $id          = $this->request->getVar('id'); // <input type="hidden" name="id">
        $nombre      = $this->request->getVar('nombre');
        $descripcion = $this->request->getVar('descripcion');
        $precio      = $this->request->getVar('precio');
        $stock       = $this->request->getVar('stock');
        $categoria   = $this->request->getVar('categoria');

        $datos = [
            'nombre'       => $nombre,
            'descripcion'  => $descripcion,
            'precio'       => $precio,
            'stock'        => $stock,
            'categoria_id' => $categoria
        ];

        $productoModel->update($id, $datos);

        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/png,image/jpg,image/jpeg]',
                'max_size[imagen,1024]'
            ]
        ]);

        if ($validacion) {
            if ($imagen = $this->request->getFile('imagen')) {
                
                $datosProducto = $productoModel->find($id);
                $rutaImagen = '../public/uploads/'. $datosProducto['imagen'];
                if (file_exists($rutaImagen)) {
                    unlink($rutaImagen);
                }

                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('../public/uploads/', $nuevoNombre);

                $productoModel->update($id, ['imagen' => $nuevoNombre]);
            }
        }
        return redirect()->to(base_url('productos'));
    }
}