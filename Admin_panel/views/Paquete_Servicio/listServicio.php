<label>Seleccione un servicio a agregar al paquete</label>
<table>
	<thead>
		<th>ID</th>
		<th>Nombre</th>
		<th>Seleccionar</th>
	</thead>
	<tbody>
		<?php 
		$id_paquete=$_POST['employee_id'];
		 require_once "../../class/Servicio.php";
                         $Servicios = new Servicio();
                         $ListServicio = $Servicios->selectALL();
                         foreach ($ListServicio as $key) {
                         	echo '<tr>
                         	<td>'.$key['id_servicio'].'</td>
                         	<td>'.$key['nombre'].'</td>
                         	<td>
                                     <a href="../controllers/PaqueteController.php?id_paquete='.$id_paquete.'&id_servicio='.$key['id_servicio'].'&accion=PS" class="btn btn-info">+</a></td>
                         	</tr>';
                         }
                 
		 ?>
	</tbody>
</table>