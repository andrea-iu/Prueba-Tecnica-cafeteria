<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?php echo $titulo; ?></h4>


        <form method="POST" action="<?php echo base_url();?>/categorias/actualizar" autocomplete="off">

            <div class="form-group">
              <div class="row ">
                  <input class="form-control" id="id" name="id" type="hidden"  value="<?php echo $datos['id'] ?>">
                  <div class="col-12 col-sm-6">
                       <label>Nombre</label>
                       <input class="form-control" id="nombre" name="nombre" type="text"  value="<?php echo $datos['nombre'] ?>" autofocus >

                  </div>
              </div>
            </div>

            <a href="<?php echo base_url(); ?>/categorias" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">  Guardar</button>
        </form>
       
        
      
  </div>
</main>
