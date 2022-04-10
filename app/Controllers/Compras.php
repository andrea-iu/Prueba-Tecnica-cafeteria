<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComprasModel;
use App\Models\TemporalModel;
use App\Models\DetalleModel;
use App\Models\ProductosModel;



class Compras extends BaseController
{
   protected $compras, $temporal_compra, $detalle_compra, $productos;

    public function __construct(){

        $this->compras = new ComprasModel();
        $this->detalle_compra = new DetalleModel();


        helper(['form']);
                 
        } 

    public function index($estado = 1){

            $compras = $this->compras->where('estado',$estado)->findAll();
            $data =['titulo' => 'Compras' , 'datos' => $compras];

            echo view('header');
            echo view('compras/compras', $data);
            echo view('footer');

    }

      public function nuevo(){
          
            echo view('header');
            echo view('compras/nuevo');
            echo view('footer');

        }


        public function guarda(){

            $id_compra = $this->request->getPost('id_compra');
            $total = $this->request->getPost('total');

            $this->compras->insertarCompra($id_compra, $total);

            $resultado_id = $this->compras->insertarCompra($id_compra, $total);

            $this->temporal_compra = new TemporalModel();

            if ($resultado_id) {

                $resultadoCompra = $this->temporal_compra->porCompra($id_compra);
                foreach ($resultadoCompra as $row) {

                    $this->detalle_compra->save([
                        'id_compra' => $resultado_id,
                        'id_producto' => $row['id_producto'],
                        'nombre'   => $row['nombre'],
                        'cantidad' => $row['cantidad'],
                        'precio'   => $row['precio']
                    ]);
                    $this->productos = new ProductosModel();
                    $this->productos -> actualizastock($row['id_producto'], $row['cantidad']);
                }

                $this->temporal_compra->eliminarCompra($id_compra);
                
            } 
            return redirect()->to(base_url().'/productos'); 
        }

           
}


