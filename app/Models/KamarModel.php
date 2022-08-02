<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table = 'kamar';
    

    public function getKamar($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['nokamar'=>$id]);
        }   
    }

    public function saveKamar($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateKamar($data, $nokamar)
    {
        $query = $this->db->table('kamar')->update($data, array('nokamar' => $nokamar));
        return $query;
    }
    public function deleteKamar($nokamar)
	{
		$query = $this->db->table($this->table)
			->delete(['nokamar' => $nokamar]);
		return $query;
	}
	protected $primaryKey           = 'nokamar';
	// protected $useAutoIncrement     = true;

	// protected $returnType           = 'array';

    // protected $allowedFields = [
    //     'jeniskamar', 
    //     'jumlahkamar',
    //     'harga',
    //     'gambar'
    // ];

    protected $useTimestamps = false;
    protected $validationRules      = [];
	protected $validationMessages   = [];
	// protected $skipValidation       = false;
}