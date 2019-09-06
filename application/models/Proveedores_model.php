<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores_model extends CI_Model {

	public function getProveedores(){
		$this->db->select("p.*,c.nombre as producto");
		$this->db->from("proveedores p");
		$this->db->join("productos c","p.producto_id = c.id");
		$this->db->where("p.estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getProveedor($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("proveedores");
		return $resultado->row();
	}
	public function save($data){
		return $this->db->insert("proveedores",$data);
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("proveedores",$data);
	}

}