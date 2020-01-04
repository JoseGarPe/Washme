<form role="form" action="../controllers/CategoriaController.php?accion=modificar" method="post">
              <div class="box-body">
<?php 
  $id_empresa = $_POST['employee_empresa'];
                        echo '<input type="hidden"  name="id_empresa" id="id_empresa" value="'.$id_empresa.'" class="form-control">';

require_once "../../class/Historial_Servicio.php";
       
              $codigo=$_POST["employee_id"];
               $Categoria = new Historial_servicio();
                         $dato = $Categoria->selectOne($codigo);
                        
                      foreach ((array)$dato as $row) {
                        
                  echo ' 
                     <div class="form-group">
                  <label for="codigo">N°</label>
                  <input type="text" class="form-control" readonly value="'.$codigo.'" id="id" name="id">
                </div> 

    <div class="form-group">
                      <label for="exampleFormControlSelect3">Nivel Acceso</label>
                       <div class="input-group-prepend bg-primary border-primary">
                              <span class="input-group-text bg-transparent">
                                <i class="mdi mdi mdi-folder-key text-white"></i>
                              </span>
                              <select class="form-control" id="exampleFormControlSelect3" name="id_servicio" aria-describedby="colored-addon2">
                                <option value="0">SELECCIONE UNA OPCION</option>';
                              
                                 require_once "../../class/Servicio.php";
                         $NivelA = new Servicio();
                         $ListUsua = $NivelA->selectALL();
                         foreach ((array)$ListUsua as $r) {
                          if ($row['id_tipo_usuario']==$r['id_tipo_usuario']) {
                            
                          echo '<option value="'.$r['id_servicio'].'" selected>'.$r['nombre'].'</option>';
                          }else{
                          echo '<option value="'.$r['id_servicio'].'">'.$r['nombre'].'</option>';
                        }
                         }
                                
                   echo'   </select>
                       </div>
                       <div class="form-group">
                          <label>Fecha Realizado</label>  
                            <div class="input-group-prepend bg-primary">
                              <span class="input-group-text bg-transparent">
                                <i class="mdi mdi mdi-check-network-outline text-white"></i>
                              </span>
                            </div>
                            <input type="date"  name="fecha_realizado" value="'.$row['fecha_realizado'].'" id="fecha_realizado" class="form-control">
                          
                        </div> 
                        <div class="form-group">
                          <label>No. Factura</label>  
                          <div class="input-group">
                            <div class="input-group-prepend bg-primary border-primary">
                              <span class="input-group-text bg-transparent">
                                <i class="mdi mdi mdi-card-text-outline text-white"></i>
                              </span>
                            </div>
                            <input type="text"  name="n_factura" id="n_factura" value="'.$row['n_factura'].'" class="form-control" >
                          </div>
                        </div> 
                        <div class="form-group">
                          <label>Comentario</label>  
                          <div class="input-group">
                            <div class="input-group-prepend bg-primary border-primary">
                              <span class="input-group-text bg-transparent">
                                <i class="mdi mdi mdi-card-text-outline text-white"></i>
                              </span>
                            </div>
                            <textarea name="comentario" class="form-control" >'.$row['comentario'].'</textarea>
                          </div>
                        </div> 
            
                      <br>
                    ';

                         }


 ?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/Categoria.php'" name="cancel" value="Cancelar" >
              </div>
            </form>