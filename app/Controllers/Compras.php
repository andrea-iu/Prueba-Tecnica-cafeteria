<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComprasModel;


class Compras extends BaseController
{
   protected $compras;

    public function __construct(){
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


        public function insertar(){

            // if($this->request->getMethod() "POST" && Sthis->validate(['nombre => 'required', 'nombre_corto' =>'required' ])){
            
            if ($this ->request ->getMethod()== "post" && $this ->validate($this->reglas)) {
            
            $this->compras->save(['nombre'=> $this->request->getPost('nombre'), 'nombre_corto'=> $this->request->getPost('nombre_corto')]);
            
            return redirect()->to(base_url().'/compras');
            }else{
               $data =['titulo' => 'Agregar Compras', 'validation'=> $this->validator];

                echo view('header');
                echo view('compras/nuevo', $data);
                echo view('footer');
                
            }
        }

         public function editar($id, $valid=null){
                $unidad = $this->compras->where('id',$id)->first();
                if ($valid!= null) {
                    $dato =['titulo' => 'Editar Unidad',  'datos' => $unidad, 'validation'=> $valid];
                } else{
                    $dato =['titulo' => 'Editar Unidad',  'datos' => $unidad];
                }

                echo view('header');
                echo view('compras/editar', $dato);
                echo view('footer');

            }


            public function actualizar(){

            if ($this ->request ->getMethod()== "post" && $this->validate($this->reglas)) {
                    $this->compras->update($this->request->getPost('id'),['nombre'=> $this->request->getPost('nombre'), 'nombre_corto'=> $this->request->getPost('nombre_corto')]);

                return redirect()->to(base_url().'/compras');
            } else {

                return $this->editar($this->request->getPost('id'),$this->validator);
            }
            

            }

                  public function eliminar($id){
                $this->compras->update($id ,['estado'=>0]);

                return redirect()->to(base_url().'/compras');

            }

            public function eliminados($estado = 0){

            $compras = $this->compras->where('estado',$estado)->findAll();
            $data =['titulo' => 'Eliminados' , 'datos' => $compras];

            echo view('header');
            echo view('compras/eliminados', $data);
            echo view('footer');

        }
            public function reingresar($id){
                $this->compras->update($id ,['estado'=>1]);

                return redirect()->to(base_url().'/compras');

            }

           
}


