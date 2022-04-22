<?php 

	namespace App\Controllers;

	use App\Controllers\BaseController;
	use App\Models\ProductosModel;
	use App\Models\UnidadesModel;
	use App\Models\CategoriasModel;
    

	class Productos extends BaseController
	{
		protected $productos;
		protected$reglas;


		public function __construct(){
			$this->productos = new ProductosModel();
			$this->unidades = new UnidadesModel();
			$this->categorias = new CategoriasModel();

			helper(['form']);

			$this->reglas= [
			   'codigo'=>[
			   	  'rules' => 'required',
			       'errors' => [
                     'required'=> 'El campo {field} es Obligatorios.',
                     'is:unique'=> 'El campo {field} debe ser unico.',
                     ]
			    ],
			    'nombre'=>[
			   	  'rules' => 'required',
			       'errors' => [
                     'required'=> 'El campo {field} es Obligatorios.',
                     ]
			    ]
			];    
		} 



		public function index($estado = 1){

			$productos = $this->productos->where('estado',$estado)->findAll();
			$data =['titulo' => 'Productos' , 'datos' => $productos];

			echo view('header');
			echo view('productos/productos', $data);
            echo view('footer');

		}



	    public function nuevo(){

	    	$unidades = $this->unidades->where('estado',1)->findAll();
	        $categorias = $this->categorias->where('estado',1)->findAll();
	    	$data =['titulo' => 'Agregar productos', 'unidades' => $unidades, 'categorias' => $categorias];

	    	echo view('header');
			echo view('productos/nuevo', $data);
            echo view('footer');

	    }
        
	    public function insertar(){

			// $consulta = $this->productos->where(['referencia' => $this->request->getPost('codigo')])->find();

			

	    	if ($this ->request ->getMethod()== "post"  && $this->productos->where(['referencia' => $this->request->getPost('codigo')])->find()) {
				$unidades = $this->unidades->where('estado',1)->findAll();
	            $categorias = $this->categorias->where('estado',1)->findAll();
	           	$data =['titulo' => 'Agregar productos', 'unidades' => $unidades, 'categorias' => $categorias, 'validations'=> $this->validator];

		    	echo view('header');
				echo view('productos/nuevo', $data);
	            echo view('footer');
               
	    	
	    	
            }else{
				$this->productos->save(['referencia'=> $this->request->getPost('codigo'), 
				'nombre_producto'=> $this->request->getPost('nombre'),
				'precio'=> $this->request->getPost('precio_venta'),
				'peso'=> $this->request->getPost('peso'),
				'stock_min'=> $this->request->getPost('stock_minimo'),
				'inventariable'=> $this->request->getPost('inventariable'),
				'id_unidad'=> $this->request->getPost('id_unidad'),
				'id_categoria'=> $this->request->getPost('id_categoria')]);
				return redirect()->to(base_url().'/productos');

                
            }
	    }

	    // -----------------Editar productos------------------
       	    public function editar($id){

                $unidades = $this->unidades->where('estado',1)->findAll();
	        	$categorias = $this->categorias->where('estado',1)->findAll();
	        	$productos=$this->productos->where('id', $id)->first();
	    		$data =['titulo' => 'Editar productos', 'unidades' => $unidades, 'categorias' => $categorias, 'productos' => $productos];

       	    	echo view('header');
       			echo view('productos/editar', $data);
                echo view('footer');

       	    }

       	    public function actualizar(){

       	    	$this->productos->update($this->request->getPost('id'),['referencia'=> $this->request->getPost('codigo'), 
	    		                    'nombre_producto'=> $this->request->getPost('nombre'),
	    		                    'precio'=> $this->request->getPost('precio_venta'),
	    		                    'peso'=> $this->request->getPost('precio_compra'),
	    		                    'stock_min'=> $this->request->getPost('stock_minimo'),
	    		                    'inventariable'=> $this->request->getPost('inventariable'),
	    		                    'id_unidad'=> $this->request->getPost('id_unidad'),
	    		                    'id_categoria'=> $this->request->getPost('id_categoria')]);

       	    	return redirect()->to(base_url().'/productos');

       	    }

       	      public function eliminar($id){
       	    	$this->productos->update($id ,['estado'=>0]);

       	    	return redirect()->to(base_url().'/productos');

       	    }

       	    public function eliminados($estado = 0){

			$productos = $this->productos->where('estado',$estado)->findAll();
			$data =['titulo' => 'Eliminados' , 'datos' => $productos];

			echo view('header');
			echo view('productos/eliminados', $data);
            echo view('footer');

		}
		    public function reingresar($id){
       	    	$this->productos->update($id ,['estado'=>1]);

       	    	return redirect()->to(base_url().'/productos');

       	    }


               public function buscarCodigo($codigo){
                   $this->productos->select('*');
                   $this->productos->where('referencia',$codigo);
                   $this->productos->where('estado',1);

                   $datos= $this->productos->get()->getRow();

                   $res['existe'] = false;
                   $res['datos'] ='';
                   $res['error'] = '';

                   if ($datos) {
                       $res['datos'] = $datos;
                       $res['existe'] = true;
                   } else {
                       $error ='No esta disponible';
                       $res['existe'] = false;
                   }
                   
                  echo json_encode($res);

               }

            



	}

 ?>