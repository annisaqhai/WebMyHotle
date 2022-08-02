<?php

namespace App\Controllers;
use \App\Models\KonfirmasiModel;

class KonfirmasiController extends BaseController{
    public function index()//menampilkan pembayaran
    {
        $data['title']='List Metode Pembayaran';

        $konfirmasi = new KonfirmasiModel();
           ## Fetch all records
         $data['pembayaran'] = $konfirmasi->getPembayaran()->getResult();
         $data['transaksi']  = $konfirmasi->getTransaksi()->getResult();
         $data['konfirmasi'] = $konfirmasi->getKonfirmasi();
        return view('user/konfirmasipembayaran',$data);
    }

    public function input()
    {
            //include helper form
        helper(['form']);

        //set rules validation form
        $rules = [
            'transaksi'=>'required',
            'metode'=>'required',
            'namapengirim'  => 'required',
            'norekening'=>'required',
            'gambar'=>'required'
           
        ];
        if($this->validate($rules))
        {
            $konfirmasi = new KonfirmasiModel();
            $data = array ( 
                
                'no_transaksi'  => $this->request->getPost('transaksi'),
                'no_pembayaran' => $this->request->getPost('metode'),
                'namapengirim'  => $this->request->getPost('namapengirim'),
                'norekening'  => $this->request->getPost('norekening')
                
            );

            try {
                //code...

                $file = $this->request->getFile('pic');
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . 'public/assets/uploadsgambar/', $newName);


                $data['uploadgambar'] = $newName;

                $konfirmasi->saveKonfirmasi($data);
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
            session()->setFlashdata('message', 'BERHASIL MELAKUKAN PEMBAYARAN!');
            session()->setFlashdata('alert-class', 'alert-success');
            // $msg = "Berhasil Menambahkan Data Kamar Baru";
            // session()->setFlashData($msg);
            return redirect()->to('konfirmasi');
         } else {
            $data['validation'] = $this->validator;

            session()->setFlashdata('validation', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }

}