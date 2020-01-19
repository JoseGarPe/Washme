<?php 
require_once "config/conexion.php";
class paquete_servicio extends conexion
{
private $id_paquete_servicio;
private $id_paquete;
private $id_servicio;
private $estado;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_paquete_servicio= "";
        $this->id_paquete = "";
        $this->id_servicio = "";
        $this->estado= "";

}

 	public function getId_paquete_servicio() {
        return $this->id_paquete_servicio;
    }

    public function setId_paquete_servicio($id) {
        $this->id_paquete_servicio = $id;
    }
    
    public function getId_paquete() {
        return $this->id_paquete;
    }

    public function setId_paquete($id_paquete) {
        $this->id_paquete = $id_paquete;
    }

    public function getId_servicio() {
        return $this->id_servicio;
    }

    public function setId_servicio($id_servicio) {
        $this->id_servicio = $id_servicio;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

public function save()
    {
    	$query="INSERT INTO `paquete_servicio`(`id_paquete_servicio`, `id_paquete`, `id_servicio`, `estado`) VALUES(NULL,'".$this->id_paquete."','".$this->id_servicio."','".$this->estado."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE paquete_servicio SET id_paquete='".$this->id_paquete."', id_servicio='".$this->id_servicio."', estado='".$this->estado."' WHERE id_paquete_servicio='".$this->id_paquete_servicio."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM paquete_servicio WHERE id_paquete_servicio='".$this->id_paquete_servicio."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL($paquete)
    {
        $query="SELECT ps.*, s.nombre as servicio FROM paquete_servicio ps INNER JOIN servicio s ON s.id_servicio = ps.id_servicio WHERE id_paquete='".$paquete."'";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM paquete_servicio WHERE id_paquete_servicio='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }

    


}
?>