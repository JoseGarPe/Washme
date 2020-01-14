<?php 
/*
private $id_cliente;
private $nombre;
private $direccion;
private $pass;
private $id_categoria;
private $estado;
*/

require_once "../class/Cliente.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {

	 if (isset($_POST['nombre'])) {
 	$nombre=$_POST['nombre'];
 }else{
 	$nombre=NULL;
 }
 if (isset($_POST['apellido'])) {
 	$apellido=$_POST['apellido'];
 }else{
 	$apellido=NULL;
 }
 if (isset($_POST['correo'])) {
 	$correo=$_POST['correo'];
 }else{
 	$correo=NULL;
 }
  if (isset($_POST['pass'])) {
 	$pass=$_POST['pass'];
 }else{
 	$pass=NULL;
 }

  if (isset($_POST['dui'])) {
 	$dui=$_POST['dui'];
 }else{
 	$dui=NULL;
 }

  if (isset($_POST['telefono'])) {
 	$telefono=$_POST['telefono'];
 }else{
 	$telefono=NULL;
 }

	$empresa = new Cliente();
	$empresa->setNombre($nombre);
	$empresa->setDireccion($direccion);
	$empresa->setId_cliente($id_cliente);
	$empresa->setpass($pass);
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
	 if (isset($_POST['nombre'])) {
 	$nombre=$_POST['nombre'];
 }else{
 	$nombre=NULL;
 }
 if (isset($_POST['apellido'])) {
 	$apellido=$_POST['apellido'];
 }else{
 	$apellido=NULL;
 }
 if (isset($_POST['correo'])) {
 	$correo=$_POST['correo'];
 }else{
 	$correo=NULL;
 }
  if (isset($_POST['pass'])) {
 	$pass=$_POST['pass'];
 }else{
 	$pass=NULL;
 }

  if (isset($_POST['dui'])) {
 	$dui=$_POST['dui'];
 }else{
 	$dui=NULL;
 }
 $estado='Activo';

  if (isset($_POST['telefono'])) {
 	$telefono=$_POST['telefono'];
 }else{
 	$telefono=NULL;
 }
	$estado='Activo';
	$empresa = new Cliente();
	$empresa->setNombre($nombre);
	$empresa->setApellido($apellido);
	$empresa->setDireccion($direccion);
	$empresa->setTelefono($telefono);
	$empresa->setDui($dui);
	$empresa->setCorreo($correo);
	$empresa->setPass($pass);
	$empresa->setEstado($estado);
	$save=$empresa->save();
	if ($save==true) {
		header('Location: ../login/login.php?success=correcto');
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