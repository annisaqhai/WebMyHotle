<?php

namespace App\Controllers;
use \App\Models\TransaksiModel;

class ChekinController extends BaseController{
    
   
    public function index()//menampilkan pembayaran
    {
        $data['title']='List Transaksi User';

        $transaksi = new TransaksiModel();
        $data['kamar']  = $transaksi->getKamar()->getResult();
        $data['transaksi'] = $transaksi->getTransaksi();
        
        
        return view('user/chekin',$data);
    }
    public function input()
    {
            //include helper form
        helper(['form']);

        //set rules validation form
        $rules = [
            'userid'=>'required',
            'jeniskamar'=>'required',
            'jumlahkamar'  => 'required',
            'tanggalmasuk'=>'required',
            'tanggalkeluar'=>'required',
            'lama'=>'required',
            'harga'      => 'required'
           
        ];
         
        
        if($this->validate($rules))
        {
            $transaksi = new TransaksiModel();

            $data = array(
                    //namafield dalam tabel database                //namaforminput pada template
                'userid'       =>$this->request->getPost('userid'),
                'nokamar'      => $this->request->getPost('jeniskamar'),
                'jumlahkamar'  => $this->request->getPost('jumlahkamar'),
                'tanggalmasuk' =>$this->request->getPost('tanggalmasuk'),
                'tanggalkeluar'=>$this->request->getPost('tanggalkeluar'),
                'lamamenginap' =>$this->request->getPost('lama'),
                'totalharga'   => $this->request->getPost('harga'),
        ); 
        
            $transaksi->saveTransaksi($data);
            session()->setFlashdata('message', 'Transaksi Baru Berhasil di Tambahkan!');
            session()->setFlashdata('alert-class', 'alert-success');
            // $msg = "Berhasil Menambahkan Data Kamar Baru";
            // session()->setFlashData($msg);
            return redirect()->to('transaksi');

           
        }
        else{
    
            $data['validation'] = $this->validator;

            session()->setFlashdata('validation', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
       
    }

    public function delete()
    {
        $transaksi = new TransaksiModel();
        $notransaksi = $this->request->getPost('no_transaksi');

        $transaksi->deleteTransaksi($notransaksi);
        session()->setFlashdata('message', 'Data Transaksi Berhasil di Hapus!');
        session()->setFlashdata('alert-class', 'alert-success');
        return redirect()->to('transaksi');
    }

    public function cetak($no_transaksi) {  
		//set a value for $kode_pasien
	
	   // Load all views as normal
	   $data['title'] = "Transaksi | Cetak Transaksi";
	   $data['transaksi'] = $this->a_model->view_kartu($no_transaksi);
	   $this->load->view('cetak-kartu', $data);
	   // Get output html
	   $html = $this->output->get_output();
   
	   // Load library
	   $this->load->library('dompdf_gen');
   
	   // Convert to PDF
	   $this->dompdf->load_html($html);
	   $this->dompdf->render();
	   $this->dompdf->stream("cetak-kartu" . ".pdf", array ('Attachment' => 0));}

}