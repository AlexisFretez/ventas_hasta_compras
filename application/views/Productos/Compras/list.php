
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Compras
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>compras/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Compra</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover dt-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Proveedor</th>
                                    <th>Tipo Comprobante</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($compras)): ?>
                                    <?php foreach($compras as $key => $compra):?>
                                        <tr>
                                            <td><?php echo $key+1;?></td>
                                            <!-- <td><?php echo $venta->id;?></td> -->
                                            <td><?php echo $compra->nombre;?></td>
                                            <td><?php echo $compra->tipocomprobante;?></td>
                                           
                                            <td><?php echo $compra->fecha;?></td>
                                           <td><?php echo number_format(($compra->total),0,",",".") ;?></td>

                                            <!-- <td><?php echo $venta->total;?></td> --> 
                                            <td>
                                                <button type="button" class="btn btn-info btn-view-compra" value="<?php echo $compra->id;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif ?>
                            </tbody>
                        </table>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la venta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span><a href=" "target="_blank"></a>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
