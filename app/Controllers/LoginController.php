<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class LoginController extends Controller
{
    public function index()
    {
        helper(['form']);
        
        $data['title']='Masuk Akun';

        echo view('auth/login',$data);
    } 
   
 
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('Email');
        $password = $this->request->getVar('Password');
        $data = $model->where('email', $email)->first();

        if($data){

            $pass = $data['password'];
            $verify_pass = $password == $pass;

            if($verify_pass){
                $ses_data = [
                    'userid'    => $data['userid'],
                    'namalengkap'=>$data['namalengkap'],
                    'email'     => $data['email'],
                    'jeniskelamin'=>$data['jeniskelamin'],
                    'notelp'=>$data['notelp'],
                    'alamat'=>$data['alamat'],
                    'logged_in' => TRUE,
                    'role' => $data['role'],
                ];
                $session->set($ses_data);
                // Redirecting to dashboard after login
                if($data['role'] == "admin"){ //login sebagai admin
                    return redirect()->to(base_url('/admin'));

                }elseif($data['role'] == "pelanggan"){//login sebagai pelanggan

                    return redirect()->to(base_url('/user'));
                }
                //return redirect()->to('/user');
            }else{
                $session->setFlashdata('msg', 'Password yang anda masukkan salah');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email yang anda masukkan salah');
            return redirect()->to('/login');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
} 