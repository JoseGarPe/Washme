<?php 
require_once "config/conexion.php";
class Producto extends conexion
{
private $id_producto;
private $nombre;
private $descripcion;
private $precio;
private $stock;
private $estado;
private $id_categoria_producto;

public function __construct()
{
	parent::__construct(); //Llamada al constructor de la clase padre conexion

        $this->id_producto= "";
        $this->nombre = "";
        $this->descripcion = "";
        $this->precio = "";
        $this->stock = "";
        $this->estado = "";
        $this->id_categoria_producto = "";

}

 	public function getId_producto() {
        return $this->id_producto;
    }

    public function setId_producto($id) {
        $this->id_producto = $id;
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
      public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }  
      public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    } 
      public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    } 
        public function getId_categoria_producto() {
        return $this->id_categoria_producto;
    }

    public function setId_categoria_producto($id) {
        $this->id_categoria_producto = $id;
    }

public function save()
    {
    	$query="INSERT INTO `producto`(`id_producto`, `nombre`, `descripcion`,`precio`,`stock`,`estado`,`id_categoria_producto`) VALUES(NULL,'".$this->nombre."','".$this->descripcion."','".$this->precio."','".$this->stock."','".$this->estado."','".$this->id_categoria_producto."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }

     public function update()
    {
        $query="UPDATE producto SET nombre='".$this->nombre."', descripcion='".$this->descripcion."',precio='".$this->precio."',stock='".$this->stock."', id_categoria_producto='".$this->id_categoria_producto."' WHERE id_producto='".$this->id_producto."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM producto WHERE id_producto='".$this->id_producto."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
     public function selectALL()
    {
        $query="SELECT * FROM producto";
        $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM producto WHERE id_producto='".$codigo."'";
        $selectall=$this->db->query($query);
       $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTipoUsuario;
    }
      public function selectLast()
    {
        $query="SELECT * FROM producto ORDER BY id_producto DESC LIMIT 1";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }

    


}
?>