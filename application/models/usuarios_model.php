<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuarios_model extends CI_Model {
private  $id=0;
function __construct(){
		parent::__construct();
	  
  }
	

public function validaCredenciales($datos)
    {
      $query=$this->db->query("select * from usuario where login='".
      	$datos["login"]."'  and password='".$datos["password"]."';");
       if ($query->num_rows() == 0) 
		  $query=FALSE; 
	   return $query;	
	}

public function nuevoUsuariobd($datos)
    {
      $query=$this->db->query("select * from usuario where login='".
      	$datos["login"]."'  and password='".$datos["password"]."';");
       if ($query->num_rows() == 0) 
       {
       	$query=$this->db->query("insert into usuario (nombre,paterno,materno,fecha_nac,sexo,login,password) values('".
      	$datos["nombre"]."','".$datos["paterno"]."','".$datos["materno"]."','".$datos["fecha_nac"]."','".$datos["sexo"]."','"
      	.$datos["login"]."','".	$datos["password"]."');");
       	$query=TRUE;
       }
       else{
       	$query=FALSE;
       }
		  
	   return $query;	
	}	





public function listaProductos()
    {
      $query=$this->db->query("select * from productos;");
       if ($query->num_rows() == 0) 
		  $query=FALSE; 
	   return $query;	
	}


public function nuevaventa()
    {
      $date = date('Y-m-d');
      $query=$this->db->query("insert into notas (id_empleado,fecha_compra,rfc) 
        values('1','".$date."',' ');");
		
        $this->id = $this->db->insert_id();
       	return $query;
	}

public function nuevadetalleventa($datos)
    {
     
       $query=$this->db->query("insert into detalles_notas (id_producto,unidades,precio_venta,id_nota) values('".
      	$datos["id"]."','".$datos["cantidad"]."','".$datos["precio"]."','".$this->id."');");
        $query=$this->db->query("update productos set stock=stock-".$datos["cantidad"]." where id_producto=".$datos["id"]);

       	return $this->id;
	}

  public function descripcionnota($datos)
    {
     
       $query=$this->db->query("select u.nombre,u.paterno,n.fecha_compra,dn.id_detalle,dn.id_nota,dn.id_producto,dn.precio_venta,dn.unidades from notas as n inner join detalles_notas as dn 
        inner join usuario as u  where u.id_usuario=n.id_empleado   and n.id_notas=dn.id_nota and n.id_notas=".$datos["id"] );
    if ($query->num_rows() == 0) 
      $query=FALSE; 

     return $query; 
  }

  public function apartado($datos)
    {
     
       $query=$this->db->query("insert into apartado (id_venta,nombre,paterno,direccion,telefono,cantidad) values('".
        $datos["id_nota"]."','".$datos["nombre"]."','".$datos["paterno"]."','".$datos["direccion"]."','".$datos["telefono"]."','".$datos["cantidad"]."');");
    
  }

    public function contabilidad()
    {
     
       $query=$this->db->query("select n.id_notas,n.fecha_compra, unidades*precio_venta as ganancia from
        detalles_notas as dn inner join notas as n where dn.id_nota=n.id_notas");
    if ($query->num_rows() == 0) 
      $query=FALSE; 

     return $query; 
     }

     public function totalcontabilidad()
    {
     
       $query=$this->db->query("select sum(unidades*precio_venta) as ganancia from detalles_notas");
    if ($query->num_rows() == 0) 
      $query=FALSE; 

     return $query; 
     }

public function buscarapartado($id)
    {
     
       $query=$this->db->query("select * FROM apartado inner join detalles_notas where id_venta=id_nota and id_venta=".$id);
    if ($query->num_rows() == 0) 
      $query=FALSE; 

     return $query; 
     }

     public function abonar($datos)
    {
     
       $query=$this->db->query("update apartado set cantidad=cantidad+".$datos["abono"]." where id_venta=".$datos["id_venta"]);

    }


}

