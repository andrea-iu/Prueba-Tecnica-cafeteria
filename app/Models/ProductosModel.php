<?php 


namespace App\Models;
use CodeIgniter\Model;

class ProductosModel extends Model
{
	    protected $table      = 'productos';
	    protected $primaryKey = 'id';


	    protected $returnType     = 'array';
	    protected $useSoftDeletes = false;

	    protected $allowedFields = ['referencia', 'nombre_producto', 'precio', 'peso', 'id_categoria', 'stock_min', 'cantidad_sold', 'inventariable', 'id_unidad',  'estado'];

	    protected $useTimestamps = true;
	    protected $createdField  = 'fecha_reg';
	    protected $updatedField  = '';
	    protected $deletedField  = 'deleted_at';

	    protected $validationRules    = [];
	    protected $validationMessages = [];
	    protected $skipValidation     = false;


		public function actualizastock($id_producto, $cantidad){
			$this->set('cantidad_sold', "cantidad_sold + $cantidad", FALSE);
			$this->where('id', $id_producto);
			$this->update();
	}

}



 ?>