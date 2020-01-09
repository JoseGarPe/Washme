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
$last_Pro=$producto->selectLast();
	foreach ($variable as $key) {
		$ficTec=$key['id_producto'];
	}
			  # definimos la carpeta destino
    $carpeta = $_SERVER['DOCUMENT_ROOT'].'/Washme/Cliente_panel/Products/producto_'.$ficTec.'';
        $directorio = $carpeta;
    $carpetaDestino=$directorio;
 
    # si hay algun archivo que subir
    if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0])
    {
 
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["archivo"]["name"]);$i++)
        {
 
            # si es un formato de imagen
            if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png")
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["archivo"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
 
                    # movemos el archivo
                  //  $destino=$carpetaDestino.basename($_FILES["archivo"]["name"][$i]);
                    if(@move_uploaded_file($origen, $destino))
                    {
                        echo "<br>".$_FILES["archivo"]["name"][$i]." movido correctamente".$carpetaDestino;
                    }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["archivo"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: ".$carpetaDestino;
                }
            }else{
                echo "<br>".$_FILES["archivo"]["name"][$i]." - NO es imagen jpg, png o gif";
            }
        }
    }else{
        echo "<br>No se ha subido ninguna imagen";
    }

		header('Location: ../list/Producto.php?success=correcto&foto='.$foto_.'');
		# code...
	}
	else{
		header('Location: ../list/Producto.php?error=incorrecto');
	}
}

?>