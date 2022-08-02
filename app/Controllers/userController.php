<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class userController extends BaseController
{
 
    public function index()
    { 
            //include helper form
            helper(['form']);
            $data ['title']= 'Daftar Akun';
            echo view('auth/register', $data);

    }
    public function user()
    {   //include helper form
        helper(['form','url']);
            $data ['title']= 'Profile Saya';
            $users = new UserModel();
           
            
        return view('user/index',$data);
    }
   
    public function store()
   {


        //include helper form
        helper(['form']);

        //set rules validation form
        $rules = [
            'Namalengkap'   => 'required|min_length[3]|max_length[20]',
            'Email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'Password'      => 'required|min_length[6]|max_length[20]',
            'confpassword'  => 'matches[Password]',
            'Jeniskelamin'  => 'required',
            'Notelp'        => 'required|min_length[3]|max_length[12]',
            'Alamat'        => 'required|min_length[6]|max_length[200]'
        ];
         
        if($this->validate($rules))
        {
            $model = new UserModel();
            $data = [
            //namafield dalam tabel database                //namaforminput pada template
                'namalengkap'     => $this->request->getVar('Namalengkap'),
                'email'           => $this->request->getVar('Email'),
                'password'        => $this->request->getVar('Password'),
                'jeniskelamin'    => $this->request->getVar('Jeniskelamin'),
                'notelp'          => $this->request->getVar('Notelp'),
                'alamat'          => $this->request->getVar('Alamat'),
                'role' => 'pelanggan'
            ];
            $model->save($data);

            $msg = "Berhasil mendaftar";
            session()->setFlashData($msg);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;

            session()->setFlashdata('validation', $this->validator->listErrors());
            return redirect()->to('/register');
        }
         
    }

    public function update(){
        helper(['form', 'url']);
        
        $users = new UserModel();
 
        $userid = session()->get('userid');
                    //
        $data = [
        'namalengkap'     => $this->request->getVar('Namalengkap'),
        'email'           => $this->request->getVar('Email'),
        'jeniskelamin'    => $this->request->getVar('Jeniskelamin'),
        'notelp'          => $this->request->getVar('Notelp'),
        'alamat'          => $this->request->getVar('Alamat'),
    ];
    $save = $users->update($userid,$data);//

    if ($save) {

        $ses_data = [
            'namalengkap'=>$data['namalengkap'],
            'email'     => $data['email'],
            'jeniskelamin'=>$data['jeniskelamin'],
            'notelp'=>$data['notelp'],
            'alamat'=>$data['alamat'],
        ];

        session()->set($ses_data);
    }
    session()->setFlashdata('message', 'Data Berhasil di Edit!');
    session()->setFlashdata('alert-class', 'alert-success');
    return redirect()->back();
 
    }


 

  
        
}