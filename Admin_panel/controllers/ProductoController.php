<?php 
/*
private $id_producto;
private $nombre;
private $descripcion;
private $precio;
private $stock+;
private $estado;
*/

require_once "../class/Producto.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_producto =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$precio=$_POST['precio'];
	$stock=$_POST['stock'];

	$producto = new Producto();
	$producto->setNombre($nombre);
	$producto->setDescripcion($descripcion);
	$producto->setStock($stock);
	$producto->setId_producto($id_producto);
	$producto->setPrecio($precio);
	$producto->setEstado($estado);
	$update=$producto->update();
	if ($update==true) {
		header('Location: ../list/Producto.php?success=correcto');
		# code...
	}else{
		header('Location: ../list/Producto.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_producto =$_GET['id'];
	$producto = new Producto();
	$producto->setId_producto($id_producto);
	$delete=$producto->delete();
	if ($delete==true) {
		header('Location: ../list/Producto.php?success=correcto');
		# code...
	}else{
		header('Location: ../list/Producto.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$id_producto =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$precio=$_POST['precio'];
	$stock+=$_POST['stock'];
	$estado='Activo';
	$producto = new Producto();
	$producto->setNombre($nombre);
	$producto->setDescripcion($descripcion);
	$producto->setStock($stock);
	$producto->setPrecio($precio);
	$producto->setEstado($estado);
	$save=$producto->save();
	if ($save==true) {
		header('Location: ../list/Producto.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../list/Producto.php?error=incorrecto');
	}
}

?>