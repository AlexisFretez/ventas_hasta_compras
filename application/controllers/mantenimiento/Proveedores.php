<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Productos_model");
		$this->load->model("Proveedores_model");
	}

	public function index()
	{
		$data  = array(
			'proveedores' => $this->Proveedores_model->getProveedores(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/proveedores/list",$data);
		$this->load->view("layouts/footer");

	}
	public function add(){
		$data =array( 
			"productos" => $this->Productos_model->getProductos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/proveedores/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		//$codigo = $this->input->post("codigo");
		$nombre = $this->input->post("nombre");
		$num_documento = $this->input->post("num_documento");
		$direccion = $this->input->post("direccion");
		$telefono = $this->input->post("telefono");
		$producto = $this->input->post("producto");

		//$this->form_validation->set_rules("codigo","Codigo","required|is_unique[productos.codigo]");
		$this->form_validation->set_rules("nombre","Nombre","required");
		$this->form_validation->set_rules("num_documento","Numero Documento","required");
		//$this->form_validation->set_rules("stock","Stock","required");

		if ($this->form_validation->run()) {
			$data  = array(
				//codigo' => $codigo, 
				'nombre' => $nombre,
				'num_documento' => $num_documento,
				'telefono' => $telefono,
				'direccion' => $direccion,
				'producto_id' => $producto,
				'estado' => "1"
			);

			if ($this->Proveedores_model->save($data)) {
				redirect(base_url()."mantenimiento/proveedores");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/proveedores/add");
			}
		}
		else{
			$this->add();
		}

		
	}

	public function edit($id){
		$data =array( 
			"proveedor" => $this->Proveedores_model->getProveedor($id),
			"productos" => $this->Productos_model->getProductos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/proveedores/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idproveedor = $this->input->post("idproveedor");
		//$codigo = $this->input->post("codigo");
		$nombre = $this->input->post("nombre");
		$num_documento = $this->input->post("num_documento");
		$direccion = $this->input->post("direccion");
		$telefono = $this->input->post("telefono");
		$producto = $this->input->post("producto");

		$proveedorActual = $this->Proveedores_model->getProveedor($idproveedor);

		if ($num_documento == $proveedorActual->num_documento) {
			$is_unique = '';
		}
		else{
			$is_unique = '|is_unique[proveedores.num_documento]';
		}

		//$this->form_validation->set_rules("codigo","Codigo","required".$is_unique);
		$this->form_validation->set_rules("nombre","Nombre","required");
		//$this->form_validation->set_rules("precio","Precio","required");
		$this->form_validation->set_rules("num_documento","Stock","required");


		if ($this->form_validation->run()) {
			$data  = array(
				//'codigo' => $codigo, 
				'nombre' => $nombre,
				'num_documento' => $num_documento,
				'direccion' => $direccion,
				'telefono' => $telefono,
				'producto_id' => $producto,
			);
			if ($this->Proveedores_model->update($idproveedor,$data)) {
				redirect(base_url()."mantenimiento/proveedores");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/proveedores/edit/".$idproveedor);
			}
		}else{
			$this->edit($idproveedor);
		}

		
	}
	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Proveedores_model->update($id,$data);
		echo "mantenimiento/proveedores";
	}

}