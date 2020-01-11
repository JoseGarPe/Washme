<?php 
require_once "config/conexion.php";
class Cliente extends conexion
{
private $id_cliente;
private $nombre;
private $direccion;
private $anios_cliente;
private $estado;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_cliente= "";
        $this->nombre = "";
        $this->direccion = "";
        $this->anios_cliente = "";
        $this->estado = "";

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

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }  
      public function getAnios_cliente() {
        return $this->anios_cliente;
    }

    public function setAnios_cliente($anios_cliente) {
        $this->anios_cliente = $anios_cliente;
    }  
      public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    } 

public function save()
    {
    	$query="INSERT INTO `cliente`(`id_cliente`, `nombre`, `direccion`,`anios_cliente`,`estado`) VALUES(NULL,'".$this->nombre."','".$this->direccion."','".$this->anios_cliente."','".$this->estado."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE cliente SET nombre='".$this->nombre."', direccion='".$this->direccion."',anios_cliente='".$this->anios_cliente."',estado='".$this->estado."' WHERE id_cliente='".$this->id_cliente."'";
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


}
?>