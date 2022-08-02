<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model

{
// 	protected $DBGroup              = 'default';
	protected $table                = 'users';
	protected $primaryKey           = 'userid';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;

    protected $allowedFields = [
        'namalengkap', 
        'email',
        'password',
        'jeniskelamin',
		'notelp',
		'alamat',
        'role'
    ];
        protected $useTimestamps = false;
		protected $dateFormat = 'datetime'; 
		protected $createdField = 'created_at'; 
		protected $updatedField = 'updated_at'; 
		protected $deletedField = 'deleted_at'; 

// 	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function PilihUser($userid)
    {
         $query = $this->getWhere(['userid' => $userid]);
         return $query;
    }
}
