<?php

namespace App\Controllers;

use \App\Models\KamarModel;

class kamarController extends BaseController
{

    // protected $helpers = ['form','date'];
    // protected $session = null;
    // protected $request = null;
    public function index() //menampilkan datakamar
    {
        $data['title'] = 'List Kamar';

        $kamar = new KamarModel();
        $data['kamar'] = $kamar->getKamar();

        return view('admin/kamar', $data);
    }

    public function input()
    {
        //include helper form
        helper(['form']);

        //set rules validation form
        $rules = [
            'jeniskamar'   => 'required|min_length[3]|max_length[20]',
            'jumlahkamar'  => 'required',
            'harga'      => 'required',
            'gambar'  => 'required'

        ];

        if ($this->validate($rules)) {
            $kamar = new KamarModel();
            $data = array(
                //namafield dalam tabel database                //namaforminput pada template
                'jeniskamar'  => $this->request->getPost('jeniskamar'),
                'jumlahkamar' => $this->request->getPost('jumlahkamar'),
                'harga'       => $this->request->getPost('harga'),
            );

            try {
                //code...

                $file = $this->request->getFile('pic');
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . 'public/assets/uploads/', $newName);


                $data['gambar'] = $newName;

                $kamar->saveKamar($data);
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
            session()->setFlashdata('message', 'Data Kamar Baru Berhasil di Tambahkan!');
            session()->setFlashdata('alert-class', 'alert-success');
            // $msg = "Berhasil Menambahkan Data Kamar Baru";
            // session()->setFlashData($msg);
            return redirect()->to('kamar');
        } else {
            $data['validation'] = $this->validator;

            session()->setFlashdata('validation', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }


    public function update()
    {

        $rules = [
            'jeniskamar'   => 'required|min_length[3]|max_length[20]',
            'jumlahkamar'  => 'required',
            'harga'      => 'required',
            'gambar'  => 'required'

        ];

        if ($this->validate($rules)) {
            $kamar = new KamarModel();
            $nokamar = $this->request->getPost('nokamar');
            $data = array(
                'jeniskamar'  =>  $this->request->getPost('jeniskamar'),
                'jumlahkamar' =>  $this->request->getPost('jumlahkamar'),
                'harga'       =>  $this->request->getPost('harga'),
                // 'gambar'      =>  $this->request->getPost('gambar'),

            );
            try {
                //code...
                $file = $this->request->getFile('pic');

                if (!empty($file)) {

                    // cek apakah di database sebelumnya sudah ada gambar, kalau sudah ada, hapus dulu gambar lama.
                    


                    $newName = $file->getRandomName();
                    $file->move(ROOTPATH . 'public/assets/uploads/', $newName);
                    $data['gambar'] = $newName;
                }

                $kamar->updateKamar($data, $nokamar);
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
            session()->setFlashdata('message', 'Data Kamar Berhasil di Edit');
            session()->setFlashdata('alert-class', 'alert-success');
            return redirect()->back();
        } else {
            $data['validation'] = $this->validator;

            session()->setFlashdata('validation', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }



    public function delete()
    {
        $kamar = new KamarModel();
        $no = $this->request->getPost('nokamar');

        $kamar->deleteKamar($no);
        session()->setFlashdata('message', 'Data Kamar Berhasil di Hapus!');
        session()->setFlashdata('alert-class', 'alert-success');
        return redirect()->to('kamar');
    }
    // public function detail(){
    //     $data['title']='Daftar User';

    //     $users = new UserModel();
    //     // $data['users'] = $users->getRow();

    //     return view('admin/detail',$data);
    // }


}
