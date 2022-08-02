<?= $this->extend('templates/index'); ?>
<?= $this->section('Page_Content');?>


<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Konfirmasi Pembayaran</h1>

<div class="row">
                        <div class="col-md-7">
                            <div class="p-5">
                            <?php
                                     // Display Response
                                 if (session()->has('message')) {
                                 ?>
                                     <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                                         <?= session()->getFlashdata('message') ?>
                                     </div>
                                 <?php
                                 }
                                 ?>              
                                <?php if(!empty(session()->getFlashData('validation'))) :?>
                                        <div class="alert alert-danger"><?= session()->getFlashData('validation') ?></div>
                                 <?php endif;?>
                                <form action="<?= base_url();?>/konfirmasi/input" method="post" enctype="multipart/form-data">
                                
                                     <div class="form-group">
                                        <select name="transaksi" class="form-control form-control-user" id="examplenotransaksi">
                                             <option value="" class="form-control form-control-user">Pilih No Transaksi</option>
                                             <?php
                                             ?>
                                             <?php foreach ($transaksi as $row) : ?>
                                             <option  value="<?= $row->no_transaksi; ?>"class="form-control form-control-user" ><?= $row->no_transaksi; ?></option>
                                             <?php endforeach;?>
                                        </select>
                                        <!-- <input type="number" name="no_transaksi" class="form-control form-control-user" id="exampleInputNotelp"
                                            placeholder="Masukkan Nomor Transaksi"> -->
                                    </div>
                                    <div class="form-group">
                                         <select name="metode" class="form-control form-control-user" id="examplejeniskelamin">
                                             <option value="" class="form-control form-control-user">Pilih Metode</option>
                                             <?php foreach ($pembayaran as $row) : ?>
                                             <option value="<?= $row->no_pembayaran; ?>" class="form-control form-control-user"><?= $row->metode; ?></option>
                                             <?php endforeach;?>
                                         </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="namapengirim" class="form-control form-control-user" id="exampleInputNamalengkap"
                                            placeholder="Masukkan Nama Rekening Pengirim">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="norekening" class="form-control form-control-user" id="exampleInputNotelp"
                                            placeholder="Nomor Rekening Pengirim">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" id="pic" name="pic" style="display:none" onchange="document.getElementById('filename').value=this.value"> 
                                        <input type="text" id="filename" class="form-control" name="gambar" placeholder="masukkan Bukti Tranksaksi"onclick="">
                                        <input type="button" class="btn btn-primary " style="position: relative;bottom: 38px; left:353px;" value="Pilih Gambar" onclick="document.getElementById('pic').click()">
                      
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit"> Konfirmasi </button>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div></div>

<?= $this->endSection(); ?>