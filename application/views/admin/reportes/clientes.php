
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Repotes
        <small>Clientes</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                
               <div class="row">
                <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Desde:</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio:'';?>">
                            </div>
                            <label for="" class="col-md-1 control-label">Hasta:</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fechafin" value="<?php  echo !empty($fechafin) ? $fechafin:'';?>">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                                <a href="<?php echo base_url(); ?>reportes/ventas" class="btn btn-danger">Restablecer</a>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="exampleclientes" class="table table-bordered table-hover dt-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Tipo de Cliente</th>
                                    <th>Tipo de Documento</th>
                                    <th>Numero de Documento</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                 
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($clientes)):?>
                                    <?php foreach($clientes as $key => $cliente):?>
                                        <tr>
                                            <td><?php echo $key+1;?></td>
                                            <!-- <td><?php echo $cliente->id;?></td> -->
                                            <td><?php echo $cliente->nombre;?></td>
                                            <td><?php echo $cliente->tipocliente;?></td>
                                            <td><?php echo $cliente->tipodocumento;?></td>
                                            <td><?php echo $cliente->num_documento;?></td>
                                            <td><?php echo $cliente->telefono;?></td>
                                            <td><?php echo $cliente->direccion;?></td>
                                            <?php $datacliente = $cliente->id."*".$cliente->nombre."*".$cliente->tipocliente."*".$cliente->tipodocumento."*".$cliente->num_documento."*".$cliente->telefono."*".$cliente->direccion;?>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-cliente"  data-toggle="modal" data-target="#modal-default" value="<?php echo $datacliente?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    
                                                </div>
                                                 
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
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
        <h4 class="modal-title">Informacion de la Clientes</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print1"><span class="fa fa-print">Imprimir</span></button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
