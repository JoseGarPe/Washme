<?php 
require_once "config/conexion.php";
class Cliente extends conexion
{
private $id_cliente;
private $nombre;
private $apellido;
private $telefono;
private $direccion;
private $dui;
private $correo;
private $estado;
private $pass;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_cliente= "";
        $this->nombre = "";
        $this->apellido = "";
        $this->telefono = "";
        $this->direccion = "";
        $this->dui = "";
        $this->correo = "";
        $this->estado = "";
        $this->pass = "";


}

 	public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_cliente($id) {
        $this->id_cliente = $id;
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
    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getDui() {
        return $this->dui;
    }

    public function setDui($dui) {
        $this->dui = $dui;
    }
    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }  
      public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }  
      public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    } 

    public function getPass() {
        return $this->correo;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

public function save()
    {
        $password = hash('sha256', $this->pass);
    	$query="INSERT INTO `cliente`(`id_cliente`, `nombre`, `apellido`, `telefono`, `direccion`, `dui`,`correo`,`estado`,`pass`) VALUES(NULL,'".$this->nombre."','".$this->apellido."','".$this->telefono."','".$this->direccion."','".$this->dui."','".$this->correo."','".$this->estado."','".$password."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE cliente SET nombre='".$this->nombre."', apellido='".$this->apellido."',telefono='".$this->telefono."', direccion='".$this->direccion."', dui='".$this->dui."',correo='".$this->correo."',estado='".$this->estado."' WHERE id_cliente='".$this->id_cliente."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM cliente WHERE id_cliente='".$this->id_cliente."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM cliente";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM cliente WHERE id_cliente='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }

    
     public function updateStatus()
    {
        $query="UPDATE cliente SET estado='".$this->estado."' WHERE id_cliente='".$this->id_cliente."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }

    public function login(){
//SELECT u.*, tu.nombre as tipo FROM usuario u INNER JOIN tipo_usuario tu ON tu.id_tipo_usuario=u.id_tipo_usuario WHERE correo='josue.garpe96@gmail.com' AND pass='58e6c99ea950d207e1f3efbac9ff5b6be8b1e196f171badcd5b9441d946dad16' AND estado='Activo'
        $pass = hash("sha256", $this->pass);
        $query1="SELECT * FROM cliente  WHERE correo='".$this->correo."' AND pass='".$pass."' AND estado='Activo'";
        $selectall1=$this->db->query($query1);
        $ListUsuario=$selectall1->fetch_all(MYSQLI_ASSOC);

        if ($selectall1->num_rows!=0) {
            foreach ($ListUsuario as $key) {
                         session_start();
                
                $_SESSION['logged-in'] = true;
                $_SESSION['Cliente']= $this->correo;
                $_SESSION['id_cliente']=$key['id_cliente'];
                $_SESSION['correo']=$key['correo'];
                 $_SESSION['tiempo']=time();
                return 1;
           
        }
            
        }

            else{
                session_start();
                $_SESSION['logged-in'] = false;
                 $_SESSION['tiempo']=0;
                return 3;
            }

    }


}
?>