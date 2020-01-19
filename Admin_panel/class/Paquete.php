<?php 
require_once "config/conexion.php";
class Paquete extends conexion
{
private $id_paquete;
private $nombre;
private $precio;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_paquete= "";
        $this->nombre = "";
        $this->precio = "";

}

 	public function getId_paquete() {
        return $this->id_paquete;
    }

    public function setId_paquete($id) {
        $this->id_paquete = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

public function save()
    {
    	$query="INSERT INTO `paquete`(`id_paquete`, `nombre`, `precio`) VALUES(NULL,'".$this->nombre."','".$this->precio."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE paquete SET nombre='".$this->nombre."', precio='".$this->precio."' WHERE id_paquete='".$this->id_paquete."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM paquete WHERE id_paquete='".$this->id_paquete."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM paquete";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM paquete WHERE id_paquete='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }

    
     public function selectOnePS($codigo)
    {
        $query="SELECT ps.*, s.nombre as servicio FROM paquete_servicio ps INNER JOIN servicio s ON s.id_servicio = ps.id_servicio WHERE id_paquete_servicio='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }



}
?>