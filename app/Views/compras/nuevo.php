<?php 
$id_compra = uniqid();

?>
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid px-4">
        <h4 class="mt-4 ">Nueva Compra☕</h4>
        <br>
  
        <form method="POST" action="<?php echo base_url();?>/compras/guarda" autocomplete="off">
           
            <div class="form-group">
              <div class="row ">
                  <div class="col-12 col-sm-4">
                    <input type="hidden" id="id_producto" name="id_producto "/> 
                       <label class="mb-2">Codigo</label>
                       <input class="form-control" id="codigo" name="codigo" type="text"  placeholder="Ingrese el Codigo y Enter" onkeyup="buscarProducto(event, this, this.value)" autofocus />
                       <label for="tagCodigo" id="resultado_error" style="color: red;"></label>

                  </div>

                   <div class="col-12 col-sm-4">
                       <label class="mb-2">Nombre Del Producto</label>
                       <input class="form-control" id="nombre" name="nombre" type="text" disabled>

                  </div>

                  <div class="col-12 col-sm-4">
                       <label class="mb-2">Cantidad</label>
                       <input class="form-control" id="cantidad" name="cantidad" type="text" >

                  </div>
              </div>

              <div class="row ">
                  <div class="col-12 col-sm-4">
                       <label class="mb-2">Precio de Compra</label>
                       <input class="form-control" id="precio_compra" name="precio_compra" type="text" >

                  </div>

                   <div class="col-12 col-sm-4">
                       <label class="mb-2">Subtotal</label>
                       <input class="form-control" id="subtotal" name="subtotal" type="text" disabled>

                  </div>

                  <div class="col-12 col-sm-4">
                       <label class="mb-2"><br>&nbsp;</label>

                       <button type="button" class="btn btn-primary" id="agregar_producto" name="agregar_producto" onclick="agregarProducto(id_producto.value,cantidad.value, '<?php echo $id_compra;?>' )">Agregar Producto</button>

                  </div>
              </div>

            </div>
            <br>

            <div class="row">
            <table class="table table-hover table-striped  table-sm  tablaProductos" id="tablaProductos" width="100%" >
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Codigo</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Total</th>
                      <th scope="col" width="10%"></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 offset-md-6">
                  <label for="" style="font-weight: bold; font-size: 30px; text-align: center;">Total $</label>
                  <input type="text" id="total" name="total" size="6"  value="00.00" readonly="true" style="font-weight: bold; font-size: 25px; text-align: center;">
                
                  <button type="button" id="completar" class="btn btn-success">Finalizar Compra</button>
                
                </div>
            </div>
        </form>   
  </div>
</main>

<script>
  $(document).ready (function(){});

    function buscarProducto(e, tagCodigo, codigo){

      var enterKey = 13;

      if(codigo != ''){

        if(e.which == enterKey){

          $.ajax({
            //envia el dato principal para realizar la busqueda por medio de ajax y tipo json
            url: '<?php echo base_url();?>/productos/buscarCodigo/' + codigo,
            dataType:'json',
            success: function(resultado){
              if(resultado == 0){
                $(tagCodigo).val();
                }else{
                  $(tagCodigo).removeClass('has-error');
                  $('#resultado_error').html(resultado.error);
                  
                  if(resultado.existe){
                  
                    $("#id_producto").val(resultado.datos.id);
                    $("#nombre").val(resultado.datos.nombre_producto);
                    $("#cantidad").val(1);
                    $("#precio_compra").val(resultado.datos.precio);
                    $("#subtotal").val(resultado.datos.precio);
                    $("#cantidad").focus();

                  }else{
                  
                    $("#id_producto").val('');
                    $("#nombre").val('');
                    $("#cantidad").val('');
                    $("#precio_compra").val('');
                    $("#subtotal").val('');
                    $("#cantidad").focus();
                  }
              }
            }
          });
        }
      }

  }


  function agregarProducto(id_producto, cantidad, id_compra){

    if(id_producto != null && id_producto !=0 && cantidad > 0){

        $.ajax({
          //envia el datos temporales
          url: '<?php echo base_url();?>/Temporalcompra/insertar/' +id_producto +"/"+cantidad+"/"+id_compra,

            success: function(resultado){
              if(resultado == 0){
                console.log('error')
              
                }else{
                  var resultado = JSON.parse(resultado);

                if (resultado.error == '') {
                  $('#tablaProductos tbody').empty();
                  $('#tablaProductos tbody').append(resultado.datos);
                  $('#total').val(resultado.total);
              }
            }
          }
        });
      }
  }


</script>