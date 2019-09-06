<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Ventas_model");
		$this->load->model("Clientes_model");
		$this->load->model("Productos_model");
		$this->load->model("Compras_model");
		$this->load->model("Proveedores_model");

	}
/*=============================================
	Vista de la list         
=============================================*/
	public function index()
	{
		$data  = array(
			'compras' => $this->Compras_model->getCompras(), 
		);
	
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view('Productos/Compras/list',$data);
		$this->load->view("layouts/footer");
		//$this->load->view('welcome_message');
	}
	/*=============================================
	FUNCION AGRTEGAR        
	=============================================*/

	public function add(){
		$data = array(
			"tipocomprobantes" => $this->Ventas_model->getComprobantes(),
			"proveedores" => $this->Proveedores_model->getProveedores(),
			"productos" => $this->Productos_model->getProductos()
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view('Productos/Compras/add',$data);
		$this->load->view("layouts/footer");
		//$this->load->view('welcome_message');

	}
	
	



	/*=============================================
	funcion de Guaedar en la base de datos          
	=============================================*/
	
	public function store(){
		$fecha = $this->input->post("fecha");
		$subtotal = $this->input->post("subtotal");
		$igv = $this->input->post("igv");
		$descuento = $this->input->post("descuento");
		$total = $this->input->post("total");
		$idcomprobante = $this->input->post("idcomprobante");
		$idproveedor = $this->input->post("idproveedor");
		//$idusuario = $this->session->userdata("id");
		$numero = $this->input->post("numero");
		$serie = $this->input->post("serie");

		$idproductos = $this->input->post("idproductos");
		$precios = $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importes");

		$data = array(
			'fecha' => $fecha,
			'subtotal' => $subtotal,
			'igv' => $igv,
			'descuento' => $descuento,
			'total' => $total,
			'tipo_comprobante_id' => $idcomprobante,
			'proveedor_id' => $idproveedor,
			//'usuario_id' => $idusuario,
			'num_documento' => $numero,
			'serie' => $serie,
		);

		if ($this->Compras_model->save($data)) {
			$idventa = $this->Compras_model->lastID();
			$this->updateComprobante($idcomprobante);
			$this->save_detalle($idproductos,$idventa,$precios,$cantidades,$importes);
			redirect(base_url()."compras");

		}else{
			redirect(base_url()."compras/add");
		}
	}
	/*=============================================
	FUNCION  ACTUALIZAR TIPOCOMPROBANTE         
	=============================================*/
	protected function updateComprobante($idcomprobante){
		$comprobanteActual = $this->Ventas_model->getComprobante($idcomprobante);
		$data  = array(
			'cantidad' => $comprobanteActual->cantidad + 1, 
		);
		$this->Ventas_model->updateComprobante($idcomprobante,$data);
	}
/*=============================================
	FUNCION  GUARDAR EN LA TABLA DETALLEVENTA        
=============================================*/
	protected function save_detalle($productos,$idventa,$precios,$cantidades,$importes){
		for ($i=0; $i < count($productos); $i++) { 
			$data  = array(
				'producto_id' => $productos[$i], 
				'venta_id' => $idventa,
				'precio' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'importe'=> $importes[$i],
			);

			$this->Compras_model->save_detalle($data);
			$this->updateProducto($productos[$i],$cantidades[$i]);

		}
	}
/*=============================================
	FUNCION  ACTUALIZAR LA CANTIDAD DEL STOCK       
=============================================*/
	protected function updateProducto($idproducto,$cantidad){
		$productoActual = $this->Productos_model->getProducto($idproducto);
		$data = array(
			'stock' => $productoActual->stock + $cantidad, 
		);
		$this->Productos_model->update($idproducto,$data);
	}
/*=============================================
	funcion view venta      
=============================================*/

	public function view(){
		$idventa = $this->input->post("id");
		$data = array(
			"compra" => $this->Compras_model->getCompra($idventa),
			"detalles" =>$this->Ventas_model->getDetalle($idventa)
		);
		$this->load->view("Productos/compras/view",$data);
	}

}