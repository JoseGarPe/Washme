<form role="form" action="../controllers/Historial_servicioController.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
  
                        $id_empresa = $_POST['employee_empresa'];
                        echo '<input type="hidden"  name="id_empresa" id="id_empresa" value="'.$id_empresa.'" class="form-control">';

require_once "../../class/Historial_Servicio.php";
               $codigo=$_POST["employee_id"];
					     $actividads = new Historial_servicio();
                         $dato = $actividads->selectOne($codigo);
                        
                      foreach ((array)$dato as $row) {
                         		echo '

                            <label>¿Desea eliminar el Registro de Servicio: <strong> '.$row['id_historial_servicio'].'</strong> con fecha: '.$row['fecha_realizado'].'? Se eliminara toda la informacion ingresada de este Registro de servicio Servicio</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_historial_servicio'].'"/>  
                             ';}
?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../list/Servicios.php'" name="cancel" value="Cancelar" >
              </div>
            </form>