<?php 
require_once "../class/Categoria_Producto.php";
$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_Categoria_Producto =$_POST['id'];
	$nombre=$_POST['nombre'];
	$descripcion=$_POST['descripcion'];
	$Categoria_Producto = new Categoria_Producto();
	$Categoria_Producto->setNombre($nombre);
	$Categoria_Producto->setDescripcion($descripcion);
	$Categoria_Producto->setId_categoria_producto($id_Categoria_Producto);
	$update=$Categoria_Producto->update();
	if ($update==true) {
		header('Location: ../list/Categoria_Producto.php?success=correcto');
		# code...
	}else{
		header('Location: ../list/Categoria_Producto.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_Categoria_Producto =$_GET['id'];
	$categor = new Categoria_Producto();
	$categor->setId_categoria_producto($id_Categoria_Producto);
	$delete=$categor->delete();
	if ($delete==true) {
		header('Location: ../list/Categoria_Producto.php?success=correcto');
		# code...
	}else{
		header('Location: ../list/Categoria_Producto.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];

	# code...
	$Categoria_Producto = new Categoria_Producto();
	$Categoria_Producto->setNombre($nombre);
	$Categoria_Producto->setDescripcion($descripcion);
	$save=$Categoria_Producto->save();
	if ($save==true) {
		header('Location: ../list/Categoria_Producto.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../list/Categoria_Producto.php?error=incorrecto');
	}
}



?>