
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid px-4">
        <h4 class="mt-4"><?php echo $titulo; ?></h4>
         <?php if (isset($validation)) { ?>
          <div class="alert alert-danger">
               <?php echo $validation->listErrors(); ?>
          </div>
        <?php } ?>


        <form method="POST" action="<?php echo base_url();?>/unidades/actualizar" autocomplete="off">

            <div class="form-group mb-4">
              <div class="row ">
                  <input class="form-control" id="id" name="id" type="hidden"  value="<?php echo $datos['id'] ?>">
                  <div class="col-12 col-sm-6">
                       <label class="mb-2">Nombre</label>
                       <input class="form-control" id="nombre" name="nombre" type="text"  value="<?php echo $datos['nombre'] ?>" autofocus >

                  </div>

                   <div class="col-12 col-sm-6">
                       <label class="mb-2">Nombre Corto</label>
                       <input class="form-control" id="nombre_corto" name="nombre_corto" type="text" value="<?php echo $datos['nombre_corto'] ?>"  >

                  </div>
              </div>
            </div>

            <a href="<?php echo base_url(); ?>/unidades" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">  Guardar</button>
        </form>
  </div>
</main>
