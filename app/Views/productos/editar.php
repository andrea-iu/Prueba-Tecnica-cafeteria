<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?php echo $titulo; ?></h4>
        <?php \Config\Services::validation()->listErrors(); ?>


        <form method="POST" action="<?php echo base_url();?>/productos/actualizar" autocomplete="off">
           <?php csrf_field(); ?>

            <div class="form-group">
              <div class="row ">
                <input class="form-control" id="id" name="id" type="hidden"  value="<?php echo $productos['id'] ?>">

                  <div class="col-12 col-sm-6">

                       <label>Codigo</label>
                       <input class="form-control"  id="referencia" name="referencia" type="text" value="<?php echo $productos['referencia'] ?>" disabled>

                  </div>

                   <div class="col-12 col-sm-6">
                       <label>Nombre</label>
                       <input class="form-control" id="nombre" name="nombre" type="text"   value="<?php echo $productos['nombre_producto'] ?>"required >
                  </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row ">
                  <div class="col-12 col-sm-6">
                       <label>Unidad</label>
                       <select class="form-control" id="id_unidad" name="id_unidad" required>

                          <option value="">Seleccionar Unidad</option>
                          <?php foreach ($unidades as $unidad ) { ?>

                            <option value="<?php echo $unidad['id']; ?>" <?php if($unidad['id']== $productos['id_unidad']){
                             echo 'selected';}?>><?php echo $unidad['nombre'];?></option>
                         <?php } ?>
                       </select>


                  </div>

                   <div class="col-12 col-sm-6">
                       <label>Categoria</label>
                        <select class="form-control" id="id_categoria" name="id_categoria" required>
                          <option value="">Seleccionar Categoria</option>
                          <?php foreach ($categorias as $categoria ) { ?>

                            <option value="<?php echo $categoria['id']; ?>"<?php if($categoria['id']== $productos['id_categoria']){
                             echo 'selected';}?>><?php echo $categoria['nombre']; ?></option>

                         <?php } ?>
                       </select>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row ">
                  <div class="col-12 col-sm-6">
                       <label>Precio Venta</label>
                       <input class="form-control" id="precio_venta" name="precio_venta" value="<?php echo $productos['precio'] ?>" type="text" autofocus required>

                  </div>

                   <div class="col-12 col-sm-6">
                       <label>Precio Compra</label>
                       <input class="form-control" id="precio_compra" name="precio_compra" value="<?php echo $productos['peso'] ?>" type="text"  required >
                  </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row ">
                  <div class="col-12 col-sm-6">
                       <label>Stock Minimos</label>
                       <input class="form-control" id="stock_minimo" name="stock_minimo" value="<?php echo $productos['stock_min'] ?>" type="text" autofocus required>

                  </div>

                   <div class="col-12 col-sm-6">
                       <label>Inventariable</label>
                       <select id="inventariable" name="inventariable" class="form-control">
                         <option value="1" <?php if ($productos['inventariable'] == 1 ) { 
                          echo 'selected';} ?>>Si</option>
                          <option value="0" <?php if ($productos['inventariable'] == 0 ) { 
                          echo 'selected';} ?>>No</option>
                       </select>
                  </div>
              </div>
            </div>

            <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">  Guardar</button>
        </form>
       
        
      
  </div>
</main>
