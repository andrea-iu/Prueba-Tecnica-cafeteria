<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?php  echo ($titulo); ?></h1>
            <div>
			   <br>

			</div>
                <div class="card-body">
                    <table id="datatablesSimple">

                        <thead>
                            <tr>
                               <th>Id</th>
                               <th>Referencia Compra</th>
                               <th>Total</th>
                               <th>Fecha Registro</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) {?>
                            <tr>
                                <td><?php echo $dato['id']; ?></td>
                                <td class="text-dark "><?php echo $dato['folio']; ?></td>
                                <td class="text-success"><?php echo $dato['total']; ?></td>
                                <td class="text-primary"><?php echo $dato['fecha_reg']; ?></td>
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



                
