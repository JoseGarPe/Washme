<?php 
/*
private $id_cliente;
private $nombre;
private $direccion;
private $anio_cliente;
private $id_categoria;
private $estado;
*/

require_once "../class/Cliente.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_cliente =$_POST['id'];
	$nombre=$_POST['nombre'];
	$direccion=$_POST['direccion'];
	$anio_cliente=1;

	$empresa = new Cliente();
	$empresa->setNombre($nombre);
	$empresa->setDireccion($direccion);
	$empresa->setId_cliente($id_cliente);
	$empresa->setanio_cliente($anio_cliente);
	$update=$empresa->update();
	if ($update==true) {
		header('Location: ../list/Empresa.php?success=correcto');
		# code...
	}else{
		header('Location: ../list/Empresa.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_cliente =$_GET['id'];
	$empresa = new Cliente();
	$empresa->setId_cliente($id_cliente);
	$delete=$empresa->delete();
	if ($delete==true) {
		header('Location: ../list/Empresa.php?success=correcto');
		# code...
	}else{
		header('Location: ../list/Empresa.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$id_cliente =$_POST['id'];
	$nombre=$_POST['nombre'];
	$direccion=$_POST['direccion'];
	$anio_cliente=1;
	$estado='Activo';
	$empresa = new Cliente();
	$empresa->setNombre($nombre);
	$empresa->setDireccion($direccion);
	$empresa->setAnios_cliente($anio_cliente);
	$empresa->setEstado($estado);
	$save=$empresa->save();
	if ($save==true) {
		header('Location: ../list/Empresa.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../list/Empresa.php?error=incorrecto');
	}
}
elseif ($accion=="estado") {
	$Id_cliente=$_POST['id'];
	$estado=$_POST['estado'];
	$acti = new Cliente();
	$acti->setId_cliente($Id_cliente);
	$acti->setEstado($estado);
	$delete=$acti->updateStatus();
	if ($delete==true) {
		header('Location: ../list/Empresa.php?success=correcto');
		# code...
	}else{
		header('Location: ../list/Empresa.php?error=incorrecto');
	}
}

?>