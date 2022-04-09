<?php 

namespace App\Models;
use CodeIgniter\Model;

class ComprasModel extends Model
{
	    protected $table      = 'compras';
	    protected $primaryKey = 'id';


	    protected $returnType     = 'array';
	    protected $useSoftDeletes = false;

	    protected $allowedFields = ['folio', 'total', 'estado'];

	    protected $useTimestamps = true;
	    protected $createdField  = 'fecha_reg';
	    protected $updatedField  = '';
	    protected $deletedField  = '';

	    protected $validationRules    = [];
	    protected $validationMessages = [];
	    protected $skipValidation     = false;
	}
?>
