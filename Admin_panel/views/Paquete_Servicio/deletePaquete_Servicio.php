<form role="form" action="../controllers/PaqueteController.php?accion=eliminarPS" method="POST">
              <div class="box-body">
<?php 
require_once "../../class/Paquete.php";
               $codigo=$_POST["employee_id"];
					     $actividads = new Paquete();
                         $dato = $actividads->selectOnePS($codigo);
                        
                      foreach ((array)$dato as $row) {
                         		echo '

                            <label>¿Desea eliminar el Servicio: <strong> '.$row['servicio'].'</strong> del paquete? </label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_paquete'].'"/>  
                             ';}
?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../list/Paquete.php'" name="cancel" value="Cancelar" >
              </div>
            </form>