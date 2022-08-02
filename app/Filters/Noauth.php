<?php namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class Noauth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('logged_in')) {

			if (!empty($arguments)) {
                $sesi = session()->role;

                if (!in_array($sesi, $arguments)) {
                    switch ($sesi) {
                        case 'admin':
                            return redirect()->to('/admin');
                            break;
                        case 'pelanggan':
                           return redirect()->to(base_url('/user'));                        
                        default:
                            # code...
                            break;
                    }
                }
            }
        } else {
            redirect()->to('/login');
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    
    }
}