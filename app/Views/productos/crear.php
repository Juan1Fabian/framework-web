<?= $header; ?>

<div class="container mt-2">
  <div class="my-2">
    <h4>Registro de Productos</h4>
    <a href="<?= base_url("productos"); ?>">Volver</a>
  </div>

  <form method="POST" action="<?= base_url('productos/guardar') ?>" enctype="multipart/form-data">
    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <label for="nombre">Nombre del producto</label>
          <input type="text" class="form-control" name="nombre" id="nombre" autofocus required>
        </div>
        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" autofocus required>
        </div>
        <div class="mb-3">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio" autofocus required>
        </div>
        <div class="mb-3">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" name="stock" id="stock" autofocus required>
        </div>
        <div>
          <label for="imagen">Adjuntar imagen del producto</label>
          <input type="file" class="form-control" name="imagen" id="imagen">
        </div>
        <div class="mb-3">
          <label for="categoria">Categoria</label>
          <select name="categoria" id="categoria" class="form-select">
            <option value="">Seleccione una categoría</option>
            <?php foreach ($categorias as $categoria): ?>
              <option value="<?= $categoria['id']; ?>"><?= $categoria['nombre']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="card-footer text-end">
        <button type="reset" class="btn btn-sm btn-outline-secondary">Cancelar</button>
        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
      </div>
    </div>
  </form>

</div>

<?= $footer; ?>