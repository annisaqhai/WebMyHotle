<?php

namespace App\Controllers;
use \App\Models\UserModel;

class AdminController extends BaseController{

    // protected $helpers = ['form','date'];
    // protected $session = null;
    // protected $request = null;
    public function index()
    {
        $data['title']='List User';

        $users = new UserModel();
        $data['users'] = $users->findAll();
        
        return view('admin/index',$data);
    }

    public function detail($userid){
        $data['title']='Daftar User';
            
           
         
        $users = new UserModel();
        $data['users'] = $users->PilihUser($userid)->getRow();
        // $data['artikel'] = $model->PilihBlog($id)->getRow();
        return view('admin/detail',$data);
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
    session()->setFlashdata('message', 'Data Berhasil di Edit!');
    session()->setFlashdata('alert-class', 'alert-success');
    return redirect()->back();
 
    }
 
    

    public function delete($userid=0){

        $users = new UserModel();
  
        ## Check record
        if($users->find($userid)){
  
           ## Delete record
           $users->delete($userid);
  
           session()->setFlashdata('message', 'Data Berhasil di Hapus!');
           session()->setFlashdata('alert-class', 'alert-success');
        }else{
           session()->setFlashdata('message', 'Data Tidak di Temukan!');
           session()->setFlashdata('alert-class', 'alert-danger');
        }
        return redirect()->route('admin/index');
     }
}