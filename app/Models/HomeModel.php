<?php 

namespace App\Models;
use CodeIgniter\Model;

class HomeModel extends Model
{
        protected $table = 'location'; 

        public function hasil()
		{
     		return $this->findAll();
        }

        function generate()
    	{
    		$db      = \Config\Database::connect();
        /*$this->db->select();
        $this->db->from('location');
        $query = $this->db->get();
  
        return $query->result();*/
        $builder = $db->table('location');
		$query =  $builder->get();
		return $query;
    	}
}