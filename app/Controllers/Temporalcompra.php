<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TemporalModel;
use App\Models\ProductosModel;


class Temporalcompra extends BaseController
{
   protected $temporal, $productos;

    public function __construct(){

          $this->temporal = new TemporalModel();
          $this->productos = new ProductosModel();
                 
        } 



        public function insertar($id_producto, $cantidad, $id_compra){

            $error ='';



            $producto = $this->productos->where('id', $id_producto)->first();
            
            if($producto){
                $datosExiste = $this->temporal->porIdProductoShop($id_producto, $id_compra);

                if ($datosExiste) {
                    
                    $cantidad = $datosExiste->cantidad + $cantidad;
                    $subtotal = $datosExiste->$datosExiste-> precio;

                    $this->temporal->actualizarProductoCompra($id_producto,$subtotal, $cantidad, $id_compra);
                 
                }else{
                    $subtotal= $cantidad* $producto['precio'];
                    $this->temporal->save([
                        'folio'=> $id_compra,
                        'id_producto'=> $id_producto,
                        'codigo'=> $producto['referencia'],
                        'nombre'=> $producto['nombre_producto'],
                        'precio'=> $producto['precio'],
                        'cantidad'=> $cantidad,
                        'subtotal'=> $subtotal
                    ]);

                }
            }else{

                $error = 'No se encuentra disponible';


           }
           $res['datos'] = $this->cargarProducto($id_compra);
           $res['total'] = $this->totalProductos($id_compra);
           $res['error'] = $error;
           echo json_encode($res);
        }


       public function cargarProducto($id_compra){


        $resultado = $this->temporal->porCompra($id_compra);

        $fila = '';
        $numFila = 0;
  
        
        foreach($resultado as $row){
            $numFila++;

            $fila.="<tr id='fila".$numFila."'>";
            $fila.="<td>".$numFila."</td>";
            $fila.="<td>".$row['codigo']."</td>";
            $fila.="<td>".$row['nombre']."</td>";
            $fila.="<td>".$row['precio']."</td>";
            $fila.="<td>".$row['cantidad']."</td>";
            $fila.="<td>".$row['subtotal']."</td>";
            $fila.="<td> <a onclick=\"eliminaProducto(".$row['id_producto']. ",'".$id_compra."')\" class='borrar' ><i class='fas fa-trash'></i></a></td>";
            $fila.="</tr>";
        }
        return $fila;
        
       }

     public function totalProductos($id_compra){

        $resultado = $this->temporal->porCompra($id_compra);
        $total = 0;
        foreach($resultado as $row){
           $total += $row['subtotal'];
        }
        return $total;
  }
  
}

