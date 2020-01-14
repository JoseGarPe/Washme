<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V17</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../controllers/ClienteController.php?accion=guardar" method="POST">
					<span class="login100-form-title p-b-34">
						Registro
					</span>
					<div class="row">
						<div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nombres  <span class="required"></span>
                            </label>
                            <div class="col-md-12 col-md-12 col-xs-12">
                              <input type="text" id="nombre" name="nombre" required="required" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Apellidos 
                            </label><br>
                            <div class="col-md-12 col-md-12 col-xs-12">
                               <input type="text" id="apellido" name="apellido" class="form-control">
                            </div>
                          </div>    
                          <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Telefono 
                            </label><br>
                            <div class="col-md-12 col-md-12 col-xs-12">
                               <input type="text" id="telefono" name="telefono" class="form-control">
                            </div>
                          </div>   

                          <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Direccion
                            </label><br>
                            <div class="col-md-12 col-md-12 col-xs-12">
                               <input type="text" id="direccion" name="direccion" class="form-control">
                            </div>
                          </div>   

                          <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Dui
                            </label><br>
                            <div class="col-md-12 col-md-12 col-xs-12">
                               <input type="text" id="dui" name="dui" class="form-control">
                            </div>
                          </div>  

                          <div class="form-group">
                            <label class="control-label col-md-6 col-sm-4 col-xs-12" for="last-name">Correo Electronico 
                            </label><br>
                            <div class="col-md-12 col-md-12 col-xs-12">
                               <input type="text" id="correo" name="correo" class="form-control">
                            </div>
                          </div>  

                          <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Contraseña
                            </label><br>
                            <div class="col-md-12 col-md-12 col-xs-12">
                               <input type="password" id="pass" name="pass" class="form-control">
                            </div>
                          </div>  
                           <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Confirmar Contraseña
                            </label><br>
                            <div class="col-md-12 col-md-12 col-xs-12">
                               <input type="password" id="pass2" name="pass2" class="form-control">
                            </div>
                          </div>     
					
					</div>
					
                          
					
					
					<div class="container-login100-form-btn">
						
						<input type="submit" name="insert" id="insert" value="Registrarse" class="btn btn-success" />  
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							User name / password?
						</a>
					</div>

					<div class="w-full text-center">
						<a href="#" class="txt3">
							Sign Up
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>