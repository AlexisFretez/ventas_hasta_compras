
<div class="row">
	<div class="col-xs-12 text-center">
		<b>Empresa de Ventas</b><br>
		Calle Moquegua 430 <br>
		Tel. 481890 <br>
		Email:yonybrondy17@gmail.com
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>Proveedor</b><br>
		<b>Nombre:</b> <?php echo $compra->nombre;?> <br>
		<!-- <b>Nro Documento:</b> <?php echo $compra->documento;?><br> -->
		<b>Telefono:</b> <?php echo $compra->telefono;?> <br>
		<b>Direccion</b> <?php echo $compra->direccion;?><br>
	</div>	
	<div class="col-xs-6">	
		<!-- <b>COMPROBANTE</b> <br>
		<b>Tipo de Comprobante:</b> <?php echo $compra->tipocomprobante;?><br>
		<b>Serie:</b> <?php echo $compra->serie;?><br>
		<b>Nro de Comprobante:</b><?php echo $compra->num_documento;?><br> -->
		<b>Fecha</b> <?php echo $compra->fecha;?>
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle):?>
				<tr>
					<td><?php echo $detalle->codigo;?></td>
					<td><?php echo $detalle->nombre;?></td>
					<td><?php echo $detalle->precio;?></td>
					<td><?php echo $detalle->cantidad;?></td>
					<td><?php echo $detalle->importe;?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $compra->subtotal;?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>IVA:</strong></td>
					<td><?php echo $compra->igv;?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo $compra->descuento;?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $compra->total;?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>