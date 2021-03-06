<form method="post" id="insert_form" action="../controllers/ProductoController.php?accion=guardar" enctype="multipart/form-data">  
                        
                        <div class="form-group">
                          <label>Nombre Servicio</label>  
                          <div class="input-group">
                            <div class="input-group-prepend bg-primary border-primary">
                              <span class="input-group-text bg-transparent">
                                <i class="mdi mdi mdi-check-network-outline text-white"></i>
                              </span>
                            </div>
                            <input type="text"  name="nombre" id="nombre" class="form-control" placeholder=" Nombres" aria-label="Nombres.." aria-describedby="colored-addon2">
                          </div>
                        </div>  
                        <div class="form-group">
                          <label>Descripcion</label>  
                          <div class="input-group">
                            <div class="input-group-prepend bg-primary border-primary">
                              <span class="input-group-text bg-transparent">
                                <i class="mdi mdi mdi-card-text-outline text-white"></i>
                              </span>
                            </div>
                            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                          </div>
                        </div> 
                      <br>
                        <div class="form-group">
                          <label>Precio</label>  
                          <div class="input-group">
                            <div class="input-group-prepend bg-primary border-primary">
                              <span class="input-group-text bg-transparent">
                                <i class="mdi mdi mdi-home-currency-usd text-white"></i>
                              </span>
                            </div>
                            <input type="number"  name="precio" id="precio" step="0.01" class="form-control" placeholder="0.00" aria-label="0.00" aria-describedby="colored-addon2">
                          </div>
                        </div>

                      
                      <div class="form-group">
                      <label for="exampleFormControlSelect3">Stock</label>
                       <div class="input-group-prepend bg-primary border-primary">
                              <span class="input-group-text bg-transparent">
                                <i class="mdi mdi mdi-folder-key text-white"></i>
                              </span>
                               <input type="number"  name="stock" id="stock" min="0" step="1" class="form-control" placeholder="0.00" aria-label="0.00" aria-describedby="colored-addon2">
                       </div>
                      
                    </div>

                      
                      <div class="form-group">
                      <label for="exampleFormControlSelect3">Tipo de Producto</label>
                       <div class="input-group-prepend bg-primary border-primary">
                              <span class="input-group-text bg-transparent">
                                <i class="mdi mdi mdi-folder-key text-white"></i>
                              </span>
                              <select class="form-control" id="exampleFormControlSelect3" name="id_categoria_producto" aria-describedby="colored-addon2">
                                <option value="0">SELECCIONE UNA OPCION</option>
                                <?php 
                                 require_once "../../class/Categoria_Producto.php";
                         $NivelA = new Categoria_Producto();
                         $ListUsua = $NivelA->selectALL();
                         foreach ((array)$ListUsua as $row) {
                          echo '<option value="'.$row['id_categoria_producto'].'">'.$row['nombre'].'</option>';
                         }
                                 ?>
                      </select>
                       </div>
                      
                    </div>
                      <div class="form-group">
                      <label for="exampleFormControlSelect3">Imagenes</label>
                      <small>*Puede seleccionar varias a la vez</small>
                       <div class="input-group-prepend bg-primary border-primary">
                              <span class="input-group-text bg-transparent">
                                <i class="mdi mdi mdi-folder-key text-white"></i>
                              </span>
                       </div>
                             <!-- <input name ="archivo[]" type ="file" multiple="multiple"> <br>-->
                      <input name ="foto_1" type ="file"><br>
                      <input name ="foto_2" type ="file"><br>
                      <input name ="foto_3" type ="file">
                    </div>
                          <input type="hidden" name="guardar" id="guardar" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>