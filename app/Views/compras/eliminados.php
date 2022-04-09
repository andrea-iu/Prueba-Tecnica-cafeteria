<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?php echo $titulo; ?></h4>
          <div>
              <p>
                  <a href="<?php echo base_url();?>/unidades" class="btn btn-success">Unidades</a>
              </p>
          </div>
                <div class="table-responsive"><table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Nombre corto</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) {?>

                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><?php echo $dato['nombre_corto']; ?></td>

                                    <td> <a href="#" data-href="<?php echo base_url().'/unidades/reingresar/'.$dato['id']; ?>"  type="button"  data-toggle="modal" data-target="#modalconfirma" title="Restaurar registro" class="btn btn-success"><i class="fas fa-arrow-circle-up"></i></a></td>

                                </tr>
                           <?php } ?>
                        </tbody>

                    </table>
                </div>
          
            </div>
        </main>

 <!-- Modal -->
 <div class="modal fade" id="modalconfirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Reingresar  Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                      <div class="modal-body">
                          <p>¿Desea retaurar este Registro?</p>
                      </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a  class="btn btn-primary  btn-ok">Aceptar</a>
              </div>
            </div>
          </div>
        </div>

