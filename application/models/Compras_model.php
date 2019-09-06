<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras_model extends CI_Model {

/*=============================================
FUNCION VISTA VENTAS
=============================================*/
	public function getCompras(){
		$this->db->select("v.*,c.nombre,tc.nombre as tipocomprobante");
		$this->db->from("compras v");
		$this->db->join("proveedores c","v.proveedor_id = c.id");
		$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
/*=============================================
FUNCION guardar  ventas
=============================================*/
	public function save($data){
		return $this->db->insert("compras",$data);
	}
/*=============================================
FUNCION RETOMA EL ULTIMO ID DE LA TABLA VENTAS
=============================================*/
	public function lastID(){
		return $this->db->insert_id();
	}
/*=============================================
	FUNCION  MUETRA LA ID  TIPOCOMPROBANTE         
=============================================*/
	 public function getComprobante($idcomprobante){
	 	$this->db->where("id",$idcomprobante);
	 	$resultado = $this->db->get("tipo_comprobante");
	 	return $resultado->row();
	 }
/*=============================================
	FUNCION  ACTUALIZAR TIPOCOMPROBANTE         
=============================================*/
	public function updateComprobante($idcomprobante,$data){
		$this->db->where("id",$idcomprobante);
		$this->db->update("tipo_comprobante",$data);
 	}
/*=============================================
	FUNCION  GUARDAR DETALLEVENTA        
=============================================*/
	public function save_detalle($data){
		$this->db->insert("detalle_compra",$data);
	}
	
	
/*=============================================
	VIEW VENTA       
=============================================*/
	public function getCompra($id){
		$this->db->select("v.*,c.nombre,c.direccion,c.telefono,c.num_documento as documento,tc.nombre as tipocomprobante");
		$this->db->from("compras v");
		$this->db->join("proveedores c","v.proveedor_id = c.id");
		$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$this->db->where("v.id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
/*=============================================
	VIEW DETALLE       
=============================================*/
	public function getDetalle($id){
		$this->db->select("dt.*,p.codigo,p.nombre");
		$this->db->from("detalle_compra dt");
		$this->db->join("productos p","dt.producto_id = p.id");
		$this->db->where("dt.compra_id",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	
/*=============================================
FUNCION MOSTRAR TIPO COMPROBANTE FACTURA Y BOLETA
=============================================*/
	//


	

	






	

	

	

	public function years(){
		$this->db->select("YEAR(fecha) as year");
		$this->db->from("ventas");
		$this->db->group_by("year");
		$this->db->order_by("year","desc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function montos($year){
		$this->db->select("MONTH(fecha) as mes, SUM(total) as monto");
		$this->db->from("ventas");
		$this->db->where("fecha >=",$year."-01-01");
		$this->db->where("fecha <=",$year."-12-31");
		$this->db->group_by("mes");
		$this->db->order_by("mes");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getVentasbyDate($fechainicio,$fechafin){
		$this->db->select("v.*,c.nombre,tc.nombre as tipocomprobante");
		$this->db->from("ventas v");
		$this->db->join("clientes c","v.cliente_id = c.id");
		$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$this->db->where("v.fecha >=",$fechainicio);
		$this->db->where("v.fecha <=",$fechafin);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}

}