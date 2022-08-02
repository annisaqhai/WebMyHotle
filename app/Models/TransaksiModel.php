<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{ 
   
    protected $table = 'transaksi';
    protected $primaryKey = 'no_transaksi';
//     protected $useAutoIncrement = true; 
//     protected $insertID = 0; 
//     protected $returnType = 'array'; 
//     protected $useSoftDeletes = false; 
//     protected $protectFields = true; 
//     protected $allowedFields = [
//         'userid',
//         'jumlahkamar',
//         'tanggalmasuk',
//         'tanggalkeluar',
//         'lamamenginap',
//         'totalharga'
//     ]; 
//        // Dates 
//    protected $useTimestamps = false; 
//    protected $dateFormat = 'datetime'; 
//    protected $createdField = 'created_at'; 
//    protected $updatedField = 'updated_at'; 
//    protected $deletedField = 'deleted_at'; 

//    // Validation 
//    protected $validationRules = []; 
//    protected $validationMessages = []; 
//    protected $skipValidation = false; 
//    protected $cleanValidationRules = true; 

//    // Callbacks 
//    protected $allowCallbacks = true; 
//    protected $beforeInsert = []; 
//    protected $afterInsert = []; 
//    protected $beforeUpdate = []; 
//    protected $afterUpdate = []; 
//    protected $beforeFind = []; 
//    protected $afterFind = []; 
//    protected $beforeDelete = []; 
//    protected $afterDelete = []; 
public function getKamar()
{
    $builder = $this->db->table('kamar');
    return $builder->get();
}
   public function getTransaksi()
   {
        return $this->db->table('transaksi')
        ->join('users','users.userid=transaksi.userid')
        ->join('kamar','kamar.nokamar=transaksi.nokamar')
        ->get()->getResultArray();  
   }

    public function saveTransaksi($data){
    $query = $this->db->table('transaksi')->insert($data);
    return $query;
    }
    public function deleteTransaksi($no_transaki)
	{
		$query = $this->db->table($this->table)
			->delete(['no_transaksi' => $no_transaki]);
		return $query;
	}

    public function PilihTransaksi($no_transaki)
    {
         $query = $this->db->table('transaksi')
         ->join('users','users.userid=transaksi.userid')
         ->join('kamar','kamar.nokamar=transaksi.nokamar')
         ->getWhere(['no_transaksi' => $no_transaki]);
         return $query;
    }
}