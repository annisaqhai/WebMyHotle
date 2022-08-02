<?php

namespace App\Models;

use CodeIgniter\Model;

class KonfirmasiModel extends Model
{

    protected $table = 'tkonfirmasi';

    protected $primaryKey = 'id';
    public function getTransaksi(){
        $builder = $this->db->table('transaksi');
        $builder->select('transaksi.no_transaksi');
        $builder->join('tkonfirmasi','tkonfirmasi.no_transaksi=transaksi.no_transaksi','left');
        $builder->where('tkonfirmasi.no_transaksi IS null');
        
        return $builder->get();
    }
    public function getPembayaran()
    {
    $builder = $this->db->table('pembayaran');
    return $builder->get();
    }
   public function getKonfirmasi()
   {
        return $this->db->table('tkonfirmasi')
        ->join('pembayaran','pembayaran.no_pembayaran=tkonfirmasi.no_pembayaran')
        ->get()->getResultArray();  
   }
   public function saveKonfirmasi($data)
   {
       $query = $this->db->table($this->table)->insert($data);
       return $query;
   }



}