<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnidadesModel;


class Unidades extends BaseController
{
   protected $unidades;

    public function __construct(){
            $this->unidades = new UnidadesModel();
            helper(['form']);
            $this->reglas= [
               'nombre'=>[
                  'rules' => 'required',
                   'errors' => [
                     'required'=> 'El campo {field} es Obligatorios.'
                     ]
                ],
                'nombre_corto'=>[
                  'rules' => 'required',
                   'errors' => [
                     'required'=> 'El campo {field} es Obligatorios.'
                     ]
                ],
            ];    
            
        } 

    public function index($estado = 1){

            $unidades = $this->unidades->where('estado',$estado)->findAll();
            $data =['titulo' => 'Unidades' , 'datos' => $unidades];

            echo view('header');
            echo view('unidades/unidades', $data);
            echo view('footer');

    }

      public function nuevo(){

            $data =['titulo' => 'Agregar Unidades'];

            echo view('header');
            echo view('unidades/nuevo', $data);
            echo view('footer');

        }


        public function insertar(){

            // if($this->request->getMethod() "POST" && Sthis->validate(['nombre => 'required', 'nombre_corto' =>'required' ])){
            
            if ($this ->request ->getMethod()== "post" && $this ->validate($this->reglas)) {
            
            $this->unidades->save(['nombre'=> $this->request->getPost('nombre'), 'nombre_corto'=> $this->request->getPost('nombre_corto')]);
            
            return redirect()->to(base_url().'/unidades');
            }else{
               $data =['titulo' => 'Agregar Unidades', 'validation'=> $this->validator];

                echo view('header');
                echo view('unidades/nuevo', $data);
                echo view('footer');
                
            }
        }

         public function editar($id, $valid=null){
                $unidad = $this->unidades->where('id',$id)->first();
                if ($valid!= null) {
                    $dato =['titulo' => 'Editar Unidad',  'datos' => $unidad, 'validation'=> $valid];
                } else{
                    $dato =['titulo' => 'Editar Unidad',  'datos' => $unidad];
                }

                echo view('header');
                echo view('unidades/editar', $dato);
                echo view('footer');

            }


            public function actualizar(){

            if ($this ->request ->getMethod()== "post" && $this->validate($this->reglas)) {
                    $this->unidades->update($this->request->getPost('id'),['nombre'=> $this->request->getPost('nombre'), 'nombre_corto'=> $this->request->getPost('nombre_corto')]);

                return redirect()->to(base_url().'/unidades');
            } else {

                return $this->editar($this->request->getPost('id'),$this->validator);
            }
            

            }

                  public function eliminar($id){
                $this->unidades->update($id ,['estado'=>0]);

                return redirect()->to(base_url().'/unidades');

            }

            public function eliminados($estado = 0){

            $unidades = $this->unidades->where('estado',$estado)->findAll();
            $data =['titulo' => 'Eliminados' , 'datos' => $unidades];

            echo view('header');
            echo view('unidades/eliminados', $data);
            echo view('footer');

        }
            public function reingresar($id){
                $this->unidades->update($id ,['estado'=>1]);

                return redirect()->to(base_url().'/unidades');

            }

           
}


