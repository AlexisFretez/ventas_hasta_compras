
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            Compras
            <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <form action="<?php echo base_url();?>Compras/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="">Comprobante:</label>
                                    <select name="comprobantes" id="comprobantes1" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($tipocomprobantes as $tipocomprobante):?> 
                                            <?php $datacomprobante = $tipocomprobante->id."*".$tipocomprobante->cantidad."*".$tipocomprobante->igv."*".$tipocomprobante->serie;?>
                                            <option value="<?php echo $datacomprobante;?>"><?php echo $tipocomprobante->nombre?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <input type="hidden" id="idcomprobante" name="idcomprobante">
                                    <input type="hidden" id="igv">
                                </div>
                                <!-- <div class="col-md-3">
                                    <label for="">Serie:</label>
                                    <input type="text" class="form-control" id="serie" name="serie" readonly>
                                </div> -->
                                <!-- <div class="col-md-3">
                                    <label for="">Numero:</label>
                                    <input type="text" class="form-control" id="numero" name="numero" readonly>
                                </div>
 -->                                
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Proveedor:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="idproveedor" id="idproveedor">
                                        <input type="text" class="form-control" disabled="disabled" id="proveedor">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div> 
                                <div class="col-md-3">
                                    <label for="">Fecha:</label>
                                    <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="fecha" required readonly>
                                </div>
                            </div>
                            <div class="form-group">
                               <div class="col-md-6">
                                <label for="">Producto:</label>
                                <div class="input-group">
                                    <input type="hidden" name="idproducto" id="idproducto">
                                    <input type="text" class="form-control" disabled="disabled" id="producto">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalproductos" ><span class="fa fa-product-hunt"></span> Buscar Producto</button>
                                    </span>
                                </div><!-- /input-group -->
                            </div> 
                           <!--  <div class="col-md-2">
                                <label for="">&nbsp;</label>
                                <button id="btn-agregar" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                            </div> -->
                        </div>
                        <table id="tbventas" class="table table-bordered table-striped table-hover dt-responsive">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>

                                    <th>Precio</th>
                                    <th>Stock.</th>
                                    <th>Cantidad</th>
                                    <th>Importe</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>

                        <div class="form-group">
                            <div class="col-md-3" class="text-right">
                                <div class="input-group">
                                    <span class="input-group-addon">Subtotal:</span>
                                    <input type="text" class="form-control" placeholder="Username" name="subtotal" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">IVA:</span>
                                    <input type="text" class="form-control" placeholder="Username" name="igv" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-6">
                                    <span class="input-group-addon">Descuento:</span>
                                    <input type="text" class="form-control" placeholder="Username" name="descuento" value="0.00" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">Total:</span>
                                    <input type="text" class="form-control" placeholder="Username" name="total" readonly="readonly">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h4 class="modal-title">Lista de Proveedores</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <table id="example1" class="table table-bordered table-striped table-hover dt-responsive ">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>Documento</th>
                                <th>Opcion</th>
                                
                            </tr>
                        </thead>
                        <!--=========================================================
                        =            View vista de clientes en el footer            =
                        ==========================================================-->
                    
                        <tbody>
                            <?php if(!empty($proveedores)):?>
                                <?php foreach($proveedores as $proveedor):?>
                                    <tr>
                                     <!-- <td><?php echo $cliente->id;?></td> --> 
                                     <td><?php echo $proveedor->nombre;?></td>
                                     <td><?php echo $proveedor->num_documento;?></td>
                                     <?php $dataproveedor = $proveedor->id."*".$proveedor->nombre."*".$proveedor->num_documento."*".$proveedor->telefono."*".$proveedor->direccion;?>
                                     <td>
                                        <button type="button" class="btn btn-success btn-check-proveedor" value="<?php echo $dataproveedor;?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>

                        <!--====  End of View vista de clientes en el footer  ====-->
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--=====================================
=          Modal de Productos           =
======================================-->





<div class="modal fade" id="modalproductos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h4 class="modal-title">Lista de Productos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <table id="example2" class="table table-bordered table-striped table-hover dt-responsive">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Opcion</th>
                                
                            </tr>
                        </thead>
                        <!--=========================================================
                        =            View vista de Productos en el footer            =
                        ==========================================================-->
                        <tbody>
                            <?php if(!empty($productos)):?>
                                <?php foreach($productos as $producto):?>
                                    <tr>                                            
                                        <td><?php echo $producto->nombre;?></td>
                                        <td><?php echo number_format(($producto->precio),0,",",".") ;?></td>
                                        <!-- <td><?php echo $producto->stock;?></td> -->
                                        <?php $dataproducto = $producto->id."*".$producto->codigo."*".$producto->nombre."*".$producto->precio."*".$producto->stock."*".$producto->categoria;?>
                                        <td>
                                         <button type="button" class="btn btn-success btn-checkproductos" value="<?php echo $dataproducto;?>"><span class="fa fa-check"></span></button>
                                     </td>
                                     


                                 </tr>
                             <?php endforeach;?>
                         <?php endif;?>
                     </tbody>
                 </table>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->















