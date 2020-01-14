<?php 
require_once "config/conexion.php";
class Categoria_Producto extends conexion
{
private $id_categoria_producto;
private $nombre;
private $descripcion;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_categoria_producto= "";
        $this->nombre = "";
        $this->descripcion = "";

}

 	public function getId_categoria_producto() {
        return $this->id_categoria_producto;
    }

    public function setId_categoria_producto($id) {
        $this->id_categoria_producto = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

public function save()
    {
    	$query="INSERT INTO `categoria_producto`(`id_categoria_producto`, `nombre`, `descripcion`) VALUES(NULL,'".$this->nombre."','".$this->descripcion."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE categoria_producto SET nombre='".$this->nombre."', descripcion='".$this->descripcion."' WHERE id_categoria_producto='".$this->id_categoria_producto."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM categoria_producto WHERE id_categoria_producto='".$this->id_categoria_producto."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM categoria_producto";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM categoria_producto WHERE id_categoria_producto='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }

    


}
?>