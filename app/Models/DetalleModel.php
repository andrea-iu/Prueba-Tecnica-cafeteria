<?php 

namespace App\Models;
use CodeIgniter\Model;

class DetalleModel extends Model
{
	    protected $table      = 'detalle_compra';
	    protected $primaryKey = 'id';


	    protected $returnType     = 'array';
	    protected $useSoftDeletes = false;

	    protected $allowedFields = ['id_producto', 'id_compra', 'nombre', 'cantidad', 'precio'];

	    protected $useTimestamps = true;
	    protected $createdField  = 'fecha_reg';
	    protected $updatedField  = '';
	    protected $deletedField  = 'deleted_at';

	    protected $validationRules    = [];
	    protected $validationMessages = [];
	    protected $skipValidation     = false;
	}
?>
