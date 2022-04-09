<?php 

	namespace App\Controllers;

	use App\Controllers\BaseController;
	use App\Models\CategoriasModel;


	class Categorias extends BaseController
	{
		protected $categorias;


		public function __construct(){
			$this->categorias = new CategoriasModel();

		} 

		public function index($estado = 1){

			$categorias = $this->categorias->where('estado',$estado)->findAll();
			$data =['titulo' => 'Categorias' , 'datos' => $categorias];

			echo view('header');
			echo view('categorias/categorias', $data);
            echo view('footer');

		}

	    public function nuevo(){

	    	$data =['titulo' => 'Agregar categorias'];

	    	echo view('header');
			echo view('categorias/nuevo', $data);
            echo view('footer');

	    }
	    public function insertar(){
	    	$this->categorias->save(['nombre'=> $this->request->getPost('nombre')]);
	    	return redirect()->to(base_url().'/categorias');

	    }

	    // -----------------Editar categorias------------------
       	    public function editar($id){

                $categoria = $this->categorias->where('id',$id)->first();
       	    	$dato =['titulo' => 'Editar Categoria',  'datos' => $categoria];

       	    	echo view('header');
       			echo view('categorias/editar', $dato);
                echo view('footer');

       	    }

       	    public function actualizar(){
       	    	$this->categorias->update($this->request->getPost('id'),['nombre'=> $this->request->getPost('nombre')]);

       	    	return redirect()->to(base_url().'/categorias');

       	    }

       	      public function eliminar($id){
       	    	$this->categorias->update($id ,['estado'=>0]);

       	    	return redirect()->to(base_url().'/categorias');

       	    }

       	    public function eliminados($estado = 0){

			$categorias = $this->categorias->where('estado',$estado)->findAll();
			$data =['titulo' => 'Eliminados' , 'datos' => $categorias];

			echo view('header');
			echo view('categorias/eliminados', $data);
            echo view('footer');

		}
		    public function reingresar($id){
       	    	$this->categorias->update($id ,['estado'=>1]);

       	    	return redirect()->to(base_url().'/categorias');

       	    }

            



	}

 ?>