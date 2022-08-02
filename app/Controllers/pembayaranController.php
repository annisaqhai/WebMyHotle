<?php

namespace App\Controllers;
use \App\Models\PembayaranModel;

class pembayaranController extends BaseController{
    public function index()//menampilkan pembayaran
    {
        $data['title']='List Metode Pembayaran';

        $pembayaran = new PembayaranModel();
           ## Fetch all records
         $data['pembayaran'] = $pembayaran->findAll();
        
        return view('admin/MetodePembayaran',$data);
    }

    public function input()
    {
            //include helper form
        helper(['form']);

        //set rules validation form
        $rules = [
            'metode'   => 'required|min_length[3]|max_length[20]',
            'nomor_rekening'  => 'required',
            'namabank'      => 'required',
            'gambarlogo'  => 'required'
           
        ];
         
        if($this->validate($rules))
        {
            $pembayaran = new PembayaranModel();
            $no_pembayaran = $this->request->getPost('no_pembayaran');
            $data = array(
                    //namafield dalam tabel database                //namaforminput pada template
                'metode'  => $this->request->getPost('metode'),
                'nomor_rekening' => $this->request->getPost('nomor_rekening'),
                'namabank'       => $this->request->getPost('namabank'),
                'gambarlogo'      => $this->request->getPost('gambarlogo'),
            );

            $file = $this->request->getFile('pic');
            $newName = $file->getRandomName();
            $file->move(ROOTPATH.'public/assets/logobank/', $newName);
            

            $data['gambarlogo'] = $newName;

            $pembayaran->savePembayaran($data);
            session()->setFlashdata('message', 'Data Metode Pembayaran Berhasil di Tambahkan!');
            session()->setFlashdata('alert-class', 'alert-success');
            // $msg = "Berhasil Menambahkan Data Pembayaran Baru";
            // session()->setFlashData($msg);
            return redirect()->to('pembayaran');
        }else{
            $data['validation'] = $this->validator;

            session()->setFlashdata('validation', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

    }

    
    public function update(){
        helper(['form']);

        //set rules validation form
        $rules = [
            'metode'   => 'required|min_length[3]|max_length[20]',
            'nomor_rekening'  => 'required',
            'namabank'      => 'required',
            'gambarlogo'  => 'required'
           
        ];
        if ($this->validate($rules)) {
            $pembayaran = new PembayaranModel();
            
            $no_pembayaran= $this->request->getPost('no_pembayaran');
            $data = array(
                    //namafield dalam tabel database                //namaforminput pada template
                'metode'  => $this->request->getPost('metode'),
                'nomor_rekening' => $this->request->getPost('nomor_rekening'),
                'namabank'       => $this->request->getPost('namabank'),
                'gambarlogo'      => $this->request->getPost('gambarlogo')
            );
            try {
                //code...
                $file = $this->request->getFile('pic');

                if (!empty($file)) {
                    // $targetfile= 'public/assets/logobank/'.$file;
                    // unlink($targetfile);
                    // // cek apakah di database sebelumnya sudah ada gambar, kalau sudah ada, hapus dulu gambar lama.
                    
                    $newName = $file->getRandomName();
                    $file->move(ROOTPATH.'public/assets/logobank/', $newName);
        
                    $data['gambarlogo'] = $newName;
        
                }

                $pembayaran->updatePembayaran($data, $no_pembayaran);
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
            session()->setFlashdata('message', 'Data Metode Pembayaran Berhasil di Edit');
            session()->setFlashdata('alert-class', 'alert-success');
            return redirect()->back();
        } else {
            $data['validation'] = $this->validator;

            session()->setFlashdata('validation', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }


    public function delete($no_pembayaran=0){

        $pembayaran = new PembayaranModel();
  
        ## Check record
        if($pembayaran->find($no_pembayaran)){
  
           ## Delete record
           $pembayaran->delete($no_pembayaran);
  
           session()->setFlashdata('message', 'Data Berhasil di Hapus!');
           session()->setFlashdata('alert-class', 'alert-success');
        }else{
           session()->setFlashdata('message', 'Data Tidak di Temukan!');
           session()->setFlashdata('alert-class', 'alert-danger');
        }
        return redirect()->route('pembayaran');
     }


}
