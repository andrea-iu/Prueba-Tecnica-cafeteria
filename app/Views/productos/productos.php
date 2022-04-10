<div id="layoutSidenav_content">
<main>
    <div class="container-fluid">
        <h4 class="mt-4"><?php echo $titulo; ?></h4>
       
          <div>
              <p>
                  <a href="<?php echo base_url();?>/productos/nuevo" class="btn btn-info">Agregar</a>
                  <a href="<?php echo base_url();?>/productos/eliminados" class="btn btn-warning">Eliminar</a>
              </p>
          </div>
                <div class="table-responsive">
                   <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Existencias</th>
                                <th>Cantidades Vendidas</th>
                                <th></th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        
                       
                        <tbody>
                            <?php foreach ($datos as $dato) {?>

                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['referencia']; ?></td>
                                    <td><?php echo $dato['nombre_producto']; ?></td>
                                    <td><?php echo $dato['precio']; ?></td>
                                    <td class="text-success"><?php echo $dato['stock_min']; ?></td>
                                    <td class="text-primary"><?php echo $dato['cantidad_sold']; ?></td>

                                    <td> <a href="<?php echo base_url().'/productos/editar/'.$dato['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>

                                    <td> <a href="#" data-href="<?php echo base_url().'/productos/eliminar/'.$dato['id']; ?>" type="button"  data-toggle="modal" data-target="#modalconfirma" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                      <div class="modal-body">
                          <p>¿Desea eliminar este registro?</p>
                      </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a  class="btn btn-primary  btn-ok">Aceptar</a>
              </div>
            </div>
          </div>
        </div>

