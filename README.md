
# CRUD Productos - CodeIgniter 4

## Descripción
Proyecto CRUD para gestionar productos, categorías y expedientes usando **CodeIgniter 4**.  
Permite crear, leer, actualizar y eliminar productos, con soporte para subir y mostrar imágenes y seleccionar categorías.

## Requisitos
- PHP
- MySQL o MariaDB  
- Composer  
- Laragon

## Instalación

1. Clonar el repositorio o copiar los archivos a tu servidor local:

```bash
git clone git@github.com:Juan1Fabian/framework-web.git
```

2. Configurar la base de datos en `Framework-Web/.env`.

3. Crear la base de datos y las tablas ejecutando el SQL:

```sql
CREATE DATABASE Crud_Productos;

USE Crud_Productos;

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2),
    stock INT NOT NULL,
    imagen VARCHAR(255),
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE CASCADE
);
```

4. Instalar dependencias:

```bash
composer
```

5. Configurar el entorno editando `.env` y definiendo la base de datos.

## Uso

- Acceder a: `http://https://framework-web.test/productos`  
- Funcionalidades:  
  - **Agregar producto**: nombre, descripción, precio, stock, imagen y categoría.  
  - **Editar producto**: cambiar datos y actualizar imagen.  
  - **Eliminar producto**: elimina el producto y su imagen.  
  - **Ver productos**: muestra todos los productos con su categoría e imagen.

## Estructura del proyecto

```
app/
 ├─ Controllers/
 │    └─ Productos.php
 ├─ Models/
 │    ├─ ProductoModel.php
 │    └─ CategoriaModel.php
 ├─ Views/
 │    ├─ layout/
 │    │    ├─ header.php
 │    │    └─ footer.php
 │    └─ productos/
 │         ├─ index.php
 │         ├─ crear.php
 │         └─ editar.php
public/
 └─ uploads/   (para las imágenes de productos)
```

## AUTOR:
# JUAN FABIAN TRUCIOS QUISPE