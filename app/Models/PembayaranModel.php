<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'no_pembayaran';
    protected $useAutoIncrement = true; 
    protected $insertID = 0; 
    protected $returnType = 'array'; 
    protected $useSoftDeletes = false; 
    protected $protectFields = true; 
    protected $allowedFields = [
        'metode',
        'nomor_rekening',
        'namabank',
        'gambarlogo'
    ]; 
       // Dates 
   protected $useTimestamps = false; 
   protected $dateFormat = 'datetime'; 
   protected $createdField = 'created_at'; 
   protected $updatedField = 'updated_at'; 
   protected $deletedField = 'deleted_at'; 

   // Validation 
   protected $validationRules = []; 
   protected $validationMessages = []; 
   protected $skipValidation = false; 
   protected $cleanValidationRules = true; 

   // Callbacks 
   protected $allowCallbacks = true; 
   protected $beforeInsert = []; 
   protected $afterInsert = []; 
   protected $beforeUpdate = []; 
   protected $afterUpdate = []; 
   protected $beforeFind = []; 
   protected $afterFind = []; 
   protected $beforeDelete = []; 
   protected $afterDelete = []; 
    
    // public function getPembayaran($no = false)
    // {
    //     if($no === false){
    //         return $this->findAll();
    //     }else{
    //         return $this->getWhere(['no_pembayaran'=>$no]);
    //     }   
    // }

    public function savePembayaran($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updatePembayaran($data, $no_pembayaran)
    {
        $query = $this->db->table('pembayaran')->update($data, array('no_pembayaran' => $no_pembayaran));
        return $query;
    }
   
}