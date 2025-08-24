<?= $header; ?>

<div class="container mt-2">
  <div class="my-2">
    <h4>Editar Producto</h4>
    <a href="<?= base_url("productos"); ?>">Volver</a>
  </div>

  <form method="POST" action="<?= base_url('productos/actualizar') ?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $producto['id']; ?>">

    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <label for="nombre">Nombre del producto</label>
          <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $producto['nombre']; ?>" required>
        </div>

        <div class="mb-3">
          <label for="descripcion">Descripción</label>
          <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?= $producto['descripcion']; ?>" required>
        </div>

        <div class="mb-3">
          <label for="precio">Precio</label>
          <input type="text" class="form-control" name="precio" id="precio" value="<?= $producto['precio']; ?>" required>
        </div>

        <div class="mb-3">
          <label for="stock">Stock</label>
          <input type="text" class="form-control" name="stock" id="stock" value="<?= $producto['stock']; ?>" required>
        </div>

        <!-- Mostrar imagen actual -->
        <div class="mb-3">
          <label>Imagen actual:</label><br>
          <?php if($producto['imagen'] && file_exists(FCPATH.'uploads/'.$producto['imagen'])): ?>
            <img src="<?= base_url('uploads/'.$producto['imagen']); ?>" alt="<?= $producto['nombre']; ?>" width="150">
          <?php else: ?>
            <p>No hay imagen cargada</p>
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <label for="imagen">Adjuntar nueva imagen (opcional)</label>
          <input type="file" class="form-control" name="imagen" id="imagen">
        </div>

        <div class="mb-3">
          <label for="categoria">Categoría</label>
          <select name="categoria" id="categoria" class="form-select" required>
            <option value="">Seleccione una categoría</option>
            <?php foreach ($categorias as $categoria): ?>
              <option value="<?= $categoria['id']; ?>" <?= $categoria['id'] == $producto['categoria_id'] ? 'selected' : '' ?>>
                <?= $categoria['nombre']; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

      </div>

      <div class="card-footer text-end">
        <button type="reset" class="btn btn-sm btn-outline-secondary">Cancelar</button>
        <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
      </div>
    </div>
  </form>
</div>

<?= $footer; ?>