<?php 
require_once "../class/Paquete.php";
require_once "../class/Paquete_Servicio.php";
$accion=$_GET['accion'];

if ($accion=="modificar") {
	$id_Paquete =$_POST['id'];
	$nombre=$_POST['nombre'];
	$Precio=$_POST['precio'];
	$Paquete = new Paquete();
	$Paquete->setNombre($nombre);
	$Paquete->setPrecio($Precio);
	$Paquete->setId_Paquete($id_Paquete);
	$update=$Paquete->update();
	if ($update==true) {
		header('Location: ../list/Paquete.php?success=correcto');
		# code...
	}else{
		header('Location: ../list/Paquete.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_Paquete =$_GET['id'];
	$categor = new Paquete();
	$categor->setId_Paquete($id_Paquete);
	$delete=$categor->delete();
	if ($delete==true) {
		header('Location: ../list/Paquete.php?success=correcto');
		# code...
	}else{
		header('Location: ../list/Paquete.php?error=incorrecto');
	}
}
elseif ($accion=="guardar") 
{
	$nombre=$_POST['nombre'];
$Precio=$_POST['precio'];

	# code...
	$Paquete = new Paquete();
	$Paquete->setNombre($nombre);
	$Paquete->setPrecio($Precio);
	$save=$Paquete->save();
	if ($save==true) {
		header('Location: ../list/Paquete.php?success=correcto');
		# code...
	}
	else{
		header('Location: ../list/Paquete.php?error=incorrecto');
	}
}

elseif ($accion=="PS") 
{
	$id_paquete=$_GET['id_paquete'];
$id_servicio=$_GET['id_servicio'];

	# code...
	$Paquete = new Paquete_Servicio();
	$Paquete->setId_paquete($id_paquete);
	$Paquete->setId_servicio($id_paquete);
	$Paquete->setEstado('Activo');
	$save=$Paquete->save();
	if ($save==true) {
		header('Location: ../list/Paquete_Servicio.php?success=correcto&paquete='.$id_paquete.'');
		# code...
	}
	else{
		header('Location: ../list/Paquete.php?error=incorrecto');
	}
}



?>