
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Proveedor
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>mantenimiento/proveedores/update" method="POST">
                            <input type="hidden" name="idproveedor" value="<?php echo $proveedor->id;?>">
                            <div class="form-group <?php echo !empty(form_error('nombre')) ? 'has-error':'';?>">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo !empty(form_error('nombre')) ? set_value('nombre'):$proveedor->nombre?>">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('nombre')) ? 'has-error':'';?>">
                                <label for="num_documento">Numero documento:</label>
                                <input type="text" class="form-control" id="num_documento" name="num_documento" value="<?php echo !empty(form_error('num_documento')) ? set_value('num_documento'):$proveedor->num_documento?>">
                                <?php echo form_error("num_documento","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Direcion:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $proveedor->direccion?>">
                            </div>
                            <div class="form-group <?php echo !empty(form_error('telefono')) ? 'has-error':'';?>">
                                <label for="telefono">Telefono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo !empty(form_error('telefono')) ? set_value('telefono'):$proveedor->telefono?>">
                                <?php echo form_error("telefono","<span class='help-block'>","</span>");?>
                            </div>
                            
                            <div class="form-group">
                                <label for="producto">Producto:</label>
                                <select name="producto" id="producto" class="form-control">
                                    <?php foreach($productos as $producto):?>
                                        <?php if($producto->id == $proveedor->producto_id):?>
                                        <option value="<?php echo $producto->id?>" selected><?php echo $producto->nombre;?></option>
                                    <?php else:?>
                                        <option value="<?php echo $producto->id?>"><?php echo $producto->nombre;?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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
