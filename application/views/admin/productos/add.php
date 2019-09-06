
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
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
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form name="calculadora" action="<?php echo base_url();?>mantenimiento/productos/store" method="POST">
                        <div class="form-group" id="tbventas1" >
                            <div class="form-group <?php echo !empty(form_error('codigo')) ? 'has-error':'';?>">
                                <label for="codigo">Codigo:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo set_value('codigo');?>">
                                <?php echo form_error("codigo","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('nombre')) ? 'has-error':'';?>">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre');?>">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group ">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>

                            <div class="form-group <?php echo !empty(form_error('precio_compra')) ? 'has-error':'';?>">
                                <label for="precio_compra">Precio Compra:</label>
                                <input type="text" class="form-control" id="precio_compra" name="precio_compra" onKeyUp="Suma()">
                                <?php echo form_error("precio_compra","<span class='help-block'>","</span>");?>
                               <!--  <input type="text" class="form-control" id="precio_compra" name="precio_compra"> -->
                            </div>
                            <div class="form-group <?php echo !empty(form_error('precio')) ? 'has-error':'';?>">
                                <label for="precio">Precio:</label>
                                <input type="text" class="form-control" id="precio" name="precio" onKeyUp="Suma()">
                                <!-- <input type="text" class="form-control" id="precio" name="precio" value="<?php echo set_value('precio');?>"> -->
                                <?php echo form_error("precio","<span class='help-block'>","</span>");?>
                                <!-- <input type="text" name="ingreso2" onKeyUp="Suma()"><br><br> -->
                            </div>
                            <div class="form-group <?php echo !empty(form_error('utilidad')) ? 'has-error':'';?>">
                                <label for="utilidad"></label>
                                <input type="text" class="form-control" id="utilidad" name="utilidad">
                                <?php echo form_error("utilidad","<span class='help-block'>","</span>");?>
                                <!-- <input type="text" name="resultado" disabled><br> -->
                            </div>
                            


                            <div class="form-group <?php echo !empty(form_error('stock')) ? 'has-error':'';?>">
                                <label for="stock">Stock:</label>
                                <input type="text" class="form-control" id="stock" name="stock" value="<?php echo set_value('stock');?>">
                                <?php echo form_error("stock","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <?php foreach($categorias as $categoria):?>
                                        <option value="<?php echo $categoria->id?>"><?php echo $categoria->nombre;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
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
<script>
//Función que realiza la suma
function Suma() {
   var precio_compra = document.calculadora.precio_compra.value;
   var precio = document.calculadora.precio.value;
   try{
      //Calculamos el número escrito:
       precio_compra = (isNaN(parseInt(precio_compra)))? 0 : parseInt(precio_compra);
       precio = (isNaN(parseInt(precio)))? 0 : parseInt(precio);
       document.calculadora.utilidad.value = precio-precio_compra;
   }
   //Si se produce un error no hacemos nada
   catch(e) {}
}
</script>

El evento onKeyUp se realiza cuando sueltas la tecla. Entonces es cuando se llama a la función Suma
<form >
Ingrese números:<br>
<input type="text" name="ingreso1" onKeyUp="Suma()"><br><br>
<input type="text" name="ingreso2" onKeyUp="Suma()"><br><br>
El resultado es:<br>
<input type="text" name="resultado" disabled><br>
</form>