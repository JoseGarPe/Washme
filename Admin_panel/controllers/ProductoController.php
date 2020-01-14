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
	$id_categoria_producto=$_POST['id_categoria_producto'];

	$producto = new Producto();
	$producto->setNombre($nombre);
	$producto->setDescripcion($descripcion);
	$producto->setStock($stock);
	$producto->setId_producto($id_producto);
	$producto->setPrecio($precio);
	$producto->setEstado($estado);
	$producto->setId_categoria_producto($id_categoria_producto);
	$update=$producto->update();
	if ($update==true) {
		header('Location: ../list/Producto.php?success=correcto');
		# code...
	}else{
		header('Location: ../list/Producto.php?error=incorrecto');
	}

}
elseif ($accion=="eliminar") {
	$id_producto =$_POST['id'];
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
	$stock=$_POST['stock'];
	$id_categoria_producto=$_POST['id_categoria_producto'];

	$estado='Activo';
	$producto = new Producto();

	$last_Pro=$producto->selectLast();
	foreach ($last_Pro as $key) {
		$ficTec=$key['id_producto']+1;
	}
			  # definimos la carpeta destino
   // $carpeta = $_SERVER['DOCUMENT_ROOT'].'/Washme/Cliente_panel/Products/producto_'.$ficTec.'/';
       // $directorio = $carpeta;
  //  $carpetaDestino=$carpeta;
 
  for ($i=1; $i <= 3 ; $i++) { 
  


if (isset($_FILES['foto_'.$i.''])){

	$max_ancho = 1280;
	$max_alto = 900;

	if($_FILES['foto_'.$i.'']['type']=='image/png' || $_FILES['foto_'.$i.'']['type']=='image/jpeg' || $_FILES['foto_'.$i.'']['type']=='image/gif'){
		$medidasimagen= getimagesize($_FILES['foto_'.$i.'']['tmp_name']);
 		$carpeta = $_SERVER['DOCUMENT_ROOT'].'/Washme/Cliente_panel/Products/producto_'.$ficTec.'/';
 		$carpeta2 = $_SERVER['DOCUMENT_ROOT'].'/Washme/Admin_panel/Products/producto_'.$ficTec.'/';
		$directorio = $carpeta;
		$directorio2 = $carpeta2;
		if($medidasimagen[0] < 1280 && $_FILES['foto_'.$i.'']['size'] < 100){
			if (!file_exists($carpeta)) {
			    mkdir($carpeta, 0777, true);
				$fichero=$directorio.basename($_FILES['foto_'.$i.'']['name']);
				if (move_uploaded_file($_FILES['foto_'.$i.'']['tmp_name'], $fichero)){
					$nombre_fo=$_FILES['foto_'.$i.'']['name'];
					$foto_seis='producto'.$ficTec.'_'.$nombre;
					} 
			}else{

				$fichero=$directorio.basename($_FILES['foto_'.$i.'']['name']);
				if (move_uploaded_file($_FILES['foto_'.$i.'']['tmp_name'], $fichero)){
					$nombre_fo=$_FILES['foto_'.$i.'']['name'];
					$foto_seis='producto'.$ficTec.'_'.$nombre;
					} 
			}
				if (!file_exists($carpeta2)) {
			    mkdir($carpeta2, 0777, true);
				$fichero2=$directorio2.basename($_FILES['foto_'.$i.'']['name']);
				if (move_uploaded_file($_FILES['foto_'.$i.'']['tmp_name'], $fichero2)){
					$nombre_fo2=$_FILES['foto_'.$i.'']['name'];
					$foto_seis2='producto'.$ficTec.'_'.$nombre;
					} 
			}else{

				$fichero2=$directorio.basename($_FILES['foto_'.$i.'']['name']);
				if (move_uploaded_file($_FILES['foto_'.$i.'']['tmp_name'], $fichero2)){
					$nombre_fo2=$_FILES['foto_'.$i.'']['name'];
					$foto_seis2='producto'.$ficTec.'_'.$nombre;
					} 
			}
	
		}
		else{


			$nombrearchivo=$_FILES['foto_'.$i.'']['name'];

			//Redimensionar
			$rtOriginal=$_FILES['foto_'.$i.'']['tmp_name'];

			if($_FILES['foto_'.$i.'']['type']=='image/jpeg'){
			$original = imagecreatefromjpeg($rtOriginal);
			}
			elseif($_FILES['foto_'.$i.'']['type']=='image/png'){
			$original = imagecreatefrompng($rtOriginal);
			}
			elseif($_FILES['foto_'.$i.'']['type']=='image/gif'){
			$original = imagecreatefromgif($rtOriginal);
			}

			list($ancho,$alto)=getimagesize($rtOriginal);

			$x_ratio = $max_ancho / $ancho;
			$y_ratio = $max_alto / $alto;


			if( ($ancho <= $max_ancho) && ($alto <= $max_alto)){
			    $ancho_final = $ancho;
			    $alto_final = $alto;
			}
			elseif (($x_ratio * $alto) < $max_alto){
			    $alto_final = ceil($x_ratio * $alto);
			    $ancho_final = $max_ancho;
			}
			else{
			    $ancho_final = ceil($y_ratio * $ancho);
			    $alto_final = $max_alto;
			}

			$lienzo=imagecreatetruecolor($ancho_final,$alto_final); 

			imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
			 
			//imagedestroy($original);
			 
			$cal=8;

			if($_FILES['foto_'.$i.'']['type']=='image/jpeg'){
			if (!file_exists($carpeta)) {
			    mkdir($carpeta, 0777, true);
				$fichero=$directorio.basename($_FILES['foto_'.$i.'']['name']);
					imagejpeg($lienzo,$directorio."".$nombrearchivo);
					$nombre_fo=$_FILES['foto_'.$i.'']['name'];
					$foto_seis='producto'.$ficTec.'_'.$nombre;
					
			}else{

				$fichero=$directorio.basename($_FILES['foto_'.$i.'']['name']);
				imagejpeg($lienzo,$directorio."".$nombrearchivo);
					$nombre_fo=$_FILES['foto_'.$i.'']['name'];
					$foto_seis='producto'.$ficTec.'_'.$nombre;
					
			}
				if (!file_exists($carpeta2)) {
				    mkdir($carpeta2, 0777, true);
					$fichero2=$directorio2.basename($_FILES['foto_'.$i.'']['name']);
						imagejpeg($lienzo,$directorio2."".$nombrearchivo);
						$nombre_fo=$_FILES['foto_'.$i.'']['name'];
						$foto_seis='producto'.$ficTec.'_'.$nombre;
						
				}else{

					$fichero2=$directorio2.basename($_FILES['foto_'.$i.'']['name']);
					imagejpeg($lienzo,$directorio2."".$nombrearchivo);
						$nombre_fo=$_FILES['foto_'.$i.'']['name'];
						$foto_seis='producto'.$ficTec.'_'.$nombre;
						
				}
			}
			elseif($_FILES['foto_'.$i.'']['type']=='image/png'){
				if (!file_exists($carpeta)) {
				    mkdir($carpeta, 0777, true);
					imagepng($lienzo,$directorio."".$nombrearchivo);
						$nombre_fo=$_FILES['foto_'.$i.'']['name'];
						$foto_seis='producto'.$ficTec.'_'.$nombre;
						
				}else{

					$fichero=$directorio.basename($_FILES['foto_'.$i.'']['name']);
					imagepng($lienzo,$directorio."".$nombrearchivo);
						$nombre_fo=$_FILES['foto_'.$i.'']['name'];
						$foto_seis='producto'.$ficTec.'_'.$nombre;
						
				}
					if (!file_exists($carpeta2)) {
				    mkdir($carpeta2, 0777, true);
					imagepng($lienzo,$directorio2."".$nombrearchivo);
						$nombre_fo=$_FILES['foto_'.$i.'']['name'];
						$foto_seis='producto'.$ficTec.'_'.$nombre;
						
				}else{

					$fichero=$directorio2.basename($_FILES['foto_'.$i.'']['name']);
					imagepng($lienzo,$directorio2."".$nombrearchivo);
						$nombre_fo=$_FILES['foto_'.$i.'']['name'];
						$foto_seis='producto'.$ficTec.'_'.$nombre;
						
				}
			}
			elseif($_FILES['foto_'.$i.'']['type']=='image/gif'){
				if (!file_exists($carpeta)) {
				    mkdir($carpeta, 0777, true);
					$fichero=$directorio.basename($_FILES['foto_'.$i.'']['name']);
			imagegif($lienzo,$directorio."".$nombrearchivo);
						$nombre_fo=$_FILES['foto_'.$i.'']['name'];
						$foto_seis='producto'.$ficTec.'_'.$nombre;
						
				}else{

					$fichero=$directorio.basename($_FILES['foto_'.$i.'']['name']);
			imagegif($lienzo,$directorio."".$nombrearchivo);
						$nombre_fo=$_FILES['foto_'.$i.'']['name'];
						$foto_seis='producto'.$ficTec.'_'.$nombre;
						
				}
				if (!file_exists($carpeta2)) {
				    mkdir($carpeta2, 0777, true);
					$fichero2=$directorio2.basename($_FILES['foto_'.$i.'']['name']);
			imagegif($lienzo,$directorio2."".$nombrearchivo);
						$nombre_fo=$_FILES['foto_'.$i.'']['name'];
						$foto_seis='producto'.$ficTec.'_'.$nombre;
						
				}else{

					$fichero2=$directorio2.basename($_FILES['foto_'.$i.'']['name']);
			imagegif($lienzo,$directorio2."".$nombrearchivo);
						$nombre_fo=$_FILES['foto_'.$i.'']['name'];
						$foto_seis='producto'.$ficTec.'_'.$nombre;
						
				}
			}


		}//end else si no es menor a 1kb
	}
	else
	{
		$mensaje="no soportado";
	}

		
	
}
	else{

		$foto_seis =NULL;
	}



  }
    
	

	$producto->setNombre($nombre);
	$producto->setDescripcion($descripcion);
	$producto->setStock($stock);
	$producto->setPrecio($precio);
	$producto->setEstado($estado);
	$producto->setId_categoria_producto($id_categoria_producto);
	$save=$producto->save();



	if ($save==true) {

		header('Location: ../list/Producto.php?success=correcto&foto='.$foto_.'');
		# code...
	}
	else{
		header('Location: ../list/Producto.php?error=incorrecto');
	}
}

?>