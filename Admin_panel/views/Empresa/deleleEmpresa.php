<form role="form" action="../controllers/clienteController.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "../../class/Cliente.php";
               $codigo=$_POST["employee_id"];
					     $actividads = new Cliente();
                         $dato = $actividads->selectOne($codigo);
                        
                      foreach ((array)$dato as $row) {
                         		echo '

                            <label>¿Desea eliminar el cliente: <strong> '.$row['nombre'].'</strong>? Se eliminara toda la informacion ingresada de este cliente</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_cliente'].'"/>  
                             ';}
?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../list/cliente.php'" name="cancel" value="Cancelar" >
              </div>
            </form>