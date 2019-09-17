<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presupuestos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Presupuestos_model");
		$this->load->model("Clientes_model");
		$this->load->model("Productos_model");
	}

	public function index(){
		$data  = array(
			'presupuestos' => $this->Presupuestos_model->getPresupuestos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/presupuestos/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data = array(
			"tipocomprobantes" => $this->Presupuestos_model->getComprobantes(),
			//PARA AGRAGAR AL MODAL SIEMPRE SE LE LLAMA A LAS FUNCIONES
			"clientes" => $this->Clientes_model->getClientes(),
			"productos" => $this->Productos_model->getProductos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/presupuestos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function getproductos(){
		$valor = $this->input->post("valor");
		$clientes = $this->Presupuestos_model->getproductos($valor);
		echo json_encode($clientes);
	}

	public function store(){
		$fecha = $this->input->post("fecha");
		$subtotal = $this->input->post("subtotal");
		$igv = $this->input->post("igv");
		$descuento = $this->input->post("descuento");
		$total = $this->input->post("total");
		$idcomprobante = $this->input->post("idcomprobante");
		$idcliente = $this->input->post("idcliente");
		//$idusuario = $this->session->userdata("id");
		//$numero = $this->input->post("numero");
		//$serie = $this->input->post("serie");

		$idproductos = $this->input->post("idproductos");
		$precios = $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importes");
		//$producto = $this->input->post("producto");

		$data = array(
			'fecha' => $fecha,
			'subtotal' => $subtotal,
			'igv' => $igv,
			'descuento' => $descuento,
			'total' => $total,
			'tipo_comprobante_id' => $idcomprobante,
			'cliente_id' => $idcliente,
			//'usuario_id' => $idusuario,
			//'num_documento' => $numero,
			//'producto_id' => $producto,
			//'serie' => $serie,
		);

		if ($this->Presupuestos_model->save($data)) {
			$idpresupuesto = $this->Presupuestos_model->lastID();
			$this->updateComprobante($idcomprobante);
			$this->save_detalle($idproductos,$idpresupuesto,$precios,$cantidades,$importes);
			redirect(base_url()."movimientos/presupuestos");

		}else{
			redirect(base_url()."movimientos/presupuestos/add");
		}
	}

	protected function updateComprobante($idcomprobante){
		$comprobanteActual = $this->Presupuestos_model->getComprobante($idcomprobante);
		$data  = array(
			'cantidad' => $comprobanteActual->cantidad, 
		);
		$this->Presupuestos_model->updateComprobante($idcomprobante,$data);
	}

	protected function save_detalle($productos,$idpresupuesto,$precios,$cantidades,$importes){
		for ($i=0; $i < count($productos); $i++) { 
			$data  = array(
				'producto_id' => $productos[$i], 
				'presupuesto_id' => $idpresupuesto,
				'precio' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'importe'=> $importes[$i],
			);

			$this->Presupuestos_model->save_detalle($data);
			$this->updateProducto($productos[$i],$cantidades[$i]);

		}
	}

	protected function updateProducto($idproducto,$cantidad){
		$productoActual = $this->Productos_model->getProducto($idproducto);
		$data = array(
			'stock' => $productoActual->stock = $cantidad, 
		);
		$this->Productos_model->update($idproducto,$data);
	}

	public function view(){
		$idpresupuesto = $this->input->post("id");
		$data = array(
			"presupuesto" => $this->Presupuestos_model->getPresupuesto($idpresupuesto),
			"detalles" =>$this->Presupuestos_model->getDetalle($idpresupuesto)
		);
		$this->load->view("admin/presupuestos/view",$data);
	}

}