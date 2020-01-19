<form role="form" action="../controllers/PaqueteController.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "../../class/Paquete.php";
               $codigo=$_POST["employee_id"];
					     $actividads = new Paquete();
                         $dato = $actividads->selectOne($codigo);
                        
                      foreach ((array)$dato as $row) {
                         		echo '

                            <label>¿Desea eliminar el Paquete: <strong> '.$row['nombre'].'</strong>? Se eliminara toda la informacion ingresada de este Paquete</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_paquete'].'"/>  
                             ';}
?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../list/Paquete.php'" name="cancel" value="Cancelar" >
              </div>
            </form>