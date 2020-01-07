<?php 

require_once "config/conexion.php";
class Usuario extends Conexion
{
 private $id_usuario;
 private $nombre;
 private $apellido;
 private $correo;
 private $pass;
 private $id_tipo_usuario;
 private $estado;
 private $telefono;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_usuario = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->correo="";
        $this->pass="";
        $this->id_tipo_usuario="";
        $this->estado="";
        $this->telefono="";
    }



	public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_usuario($id) {
        $this->id_usuario = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }
    public function getPass() {
        return $this->correo;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }
    public function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }

    public function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
        public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
 //---------------------Funciones----------------------------//
     public function save()
    {
        $password = hash('sha256', $this->pass);
    	$query="INSERT INTO usuario (id_usuario,nombre,apellido,correo,pass,id_tipo_usuario,telefono,estado)
    			values(NULL,'".$this->nombre."','".$this->apellido."','".$this->correo."','".$password."','".$this->id_tipo_usuario."','".$this->telefono."','".$this->estado."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            
            return false;
        }   
    }
     public function update()
    {
        $query="UPDATE usuario SET nombre='".$this->nombre."',apellido='".$this->apellido."',correo='".$this->correo."',id_tipo_usuario='".$this->id_tipo_usuario."', telefono='".$this->telefono."' WHERE id_usuario='".$this->id_usuario."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }

     public function updateStatus()
    {
        $query="UPDATE usuario SET estado='".$this->estado."' WHERE id_usuario='".$this->id_usuario."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }

    public function delete()
    {
       $query="DELETE FROM usuario WHERE id_usuario='".$this->id_usuario."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT u.*, tu.nombre as tipo_usuario FROM usuario u, tipo_usuario tu WHERE u.id_tipo_usuario = tu.id_tipo_usuario";
        $selectall=$this->db->query($query);
        $ListUsuarios=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListUsuarios;
    }
        public function selectALLJ()
    {
        $query="SELECT * FROM usuario WHERE id_tipo_usuario=1";
        $selectall=$this->db->query($query);
        $ListUsuarios=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListUsuarios;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM usuario WHERE id_usuario='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListUsuario;
    }
      public function selectTecnicos($codigo)
    {
        $query="SELECT * FROM usuario WHERE id_tipo_usuario='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListUsuario;
    }
    
      public function selectAllTipUsuario()
    {
        $query="SELECT * FROM tipo_usuario";
        $selectall=$this->db->query($query);
        $ListTC=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTC;
    }
    public function login(){
//SELECT u.*, tu.nombre as tipo FROM usuario u INNER JOIN tipo_usuario tu ON tu.id_tipo_usuario=u.id_tipo_usuario WHERE correo='josue.garpe96@gmail.com' AND pass='58e6c99ea950d207e1f3efbac9ff5b6be8b1e196f171badcd5b9441d946dad16' AND estado='Activo'
        $pass = hash("sha256", $this->pass);
        $query1="SELECT u.*, tu.nombre as tipo FROM usuario u INNER JOIN tipo_usuario tu ON tu.id_tipo_usuario=u.id_tipo_usuario WHERE correo='".$this->correo."' AND pass='".$pass."' AND estado='Activo'";
        $selectall1=$this->db->query($query1);
        $ListUsuario=$selectall1->fetch_all(MYSQLI_ASSOC);

        if ($selectall1->num_rows!=0) {
            foreach ($ListUsuario as $key) {
            if ($key["id_tipo_usuario"]==1) {
                session_start();
                
                $_SESSION['logged-in'] = true;
                $_SESSION['Administrador']= $this->correo;
                $_SESSION['id_usuario']=$key['id_usuario'];
                $_SESSION['id_tipo_usuario']=$key['id_tipo_usuario'];
                $_SESSION['tipo']=$key['tipo'];
                $_SESSION['correo']=$key['correo'];
                 $_SESSION['tiempo']=time();
                return 1;
            }
            elseif($key["id_tipo_usuario"]==2){
             session_start();
                $_SESSION['logged-in'] = true;
                $_SESSION['Operador']= $this->correo;
                
                $_SESSION['id_usuario']=$key['id_usuario'];
                $_SESSION['id_tipo_usuario']=$key['id_tipo_usuario'];
                $_SESSION['tipo']=$key['tipo'];
                $_SESSION['correo']=$key['correo'];
                 $_SESSION['tiempo']=time();
                return 2;

            }
            elseif($key["id_tipo_usuario"]!=2 && $key["id_tipo_usuario"]!=1){
             session_start();
                $_SESSION['logged-in'] = true;
                $_SESSION['Usuario']= $this->correo;
                $_SESSION['id_tipo_usuario']=$key['id_tipo_usuario'];
                $_SESSION['id_usuario']=$key['id_usuario'];
                $_SESSION['tipo']=$key['tipo'];
                $_SESSION['correo']=$key['correo'];
                 $_SESSION['tiempo']=time();

                return 2;

            }
            else{
                $_SESSION['logged-in'] = false;
                 $_SESSION['tiempo']=0;
                return 3;
            }
        }
            
        }

    }
    public function updatePass($contra,$nuevacontra,$usuario)
    {
        $query="SELECT * FROM usuario WHERE id_usuario='".$usuario."'";
        $selectall=$this->db->query($query);
        $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        foreach ($ListUsuario as $key) {
            $antigua_guardada=$key['pass'];
        }

        $antigua_ingresada = hash('sha256', $contra);

        if ($antigua_ingresada==$antigua_guardada) {
        $password = hash('sha256', $nuevacontra);
           
        $query="UPDATE usuario SET pass='".$password."' WHERE id_usuario='".$usuario."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return "Correcto";
        }else {
            return "Error";
        } 
        }else{
            return "Incorrecto";
        }

    }

    public function updatePass1($nuevacontra,$usuario)
    {
           
        $password = hash('sha256', $nuevacontra);
           
        $query="UPDATE usuario SET pass='".$password."' WHERE id_usuario='".$usuario."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return "Correcto";
        }else {
            return "Error";
        } 

    }
 }
?>