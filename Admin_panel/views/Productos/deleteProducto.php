<form role="form" action="../controllers/ProductoController.php?accion=eliminar" method="POST">
              <div class="box-body">
<?php 
require_once "../../class/Producto.php";
               $codigo=$_POST["employee_id"];
					     $actividads = new Producto();
                         $dato = $actividads->selectOne($codigo);
                        
                      foreach ((array)$dato as $row) {
                         		echo '

                            <label>¿Desea eliminar el Producto: <strong> '.$row['nombre'].'</strong>? Se eliminara toda la informacion ingresada de este Producto</label>
                          <input type="hidden" name="id" id="id" value="'.$row['id_producto'].'"/>  
                             ';}
?>
      </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../list/Productos.php'" name="cancel" value="Cancelar" >
              </div>
            </form>