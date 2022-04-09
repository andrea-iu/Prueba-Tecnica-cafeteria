<?php

namespace App\Controllers;

use App\Controllers\BaseController;
	use App\Models\ProductosModel;
	use App\Models\UnidadesModel;
	use App\Models\CategoriasModel;

class Home extends BaseController
{
    protected $productos;
    protected$reglas;


    public function __construct(){
        $this->productos = new ProductosModel();
        $this->unidades = new UnidadesModel();
        $this->categorias = new CategoriasModel();

          
    } 



    public function index($estado = 1){

        $productos = $this->productos->where('estado',$estado)->findAll();
        $data =['titulo' => 'Productos' , 'datos' => $productos];

        echo view('header');
        echo view('productos/productos', $data);
        echo view('footer');

    }
}