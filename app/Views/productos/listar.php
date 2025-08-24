<?php echo $header; ?>
<main class="container mt-4">
    <h1 class="mb-3 text-center">Productos</h1>
    <div class="container mt-2">
        <div class="my-2">
            <h4>Lista de Productos</h4>
            <a href="<?= base_url("productos/crear"); ?>">Registrar</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td class="text-center"><?= $producto['id'] ?></td>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['descripcion'] ?></td>
                        <td class="text-end"><?= $producto['precio'] ?></td>
                        <td class="text-center"><?= $producto['stock'] ?></td>
                        <td><img src="<?= base_url('uploads/' . $producto['imagen']) ?>" alt="<?= $producto['nombre'] ?>" width="100"></td>
                        <td><?=  $producto['categoria'] ?></td>
                        <td>
                            <a href="<?= base_url('productos/editar/' . $producto['id']) ?>" class="btn btn-warning">Editar</a>
                            <a href="<?= base_url('productos/eliminar/' . $producto['id']) ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php echo $footer; ?>
