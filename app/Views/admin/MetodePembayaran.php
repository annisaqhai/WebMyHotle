<?= $this->extend('templates/index'); ?>
<?= $this->section('Page_Content');?>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">  List Data Metode Pembayaran</h1>
  <!-- add modal -->

  <div class="container">
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addModalpembayaran" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-pencil-alt"></i> Tambah Data Metode Pembayaran
        </button>
        <!-- add modal input data -->
        <form action="/pembayaran/input" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="addModalpembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Metode Pembayaran Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <input type="text" class="form-control" name="metode" placeholder="Masukkan Metode">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="nomor_rekening" placeholder="Masukkan Nomor Rekening">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="namabank" placeholder="Masukkan Nama Rekening">
                </div>
                <div class="form-group">
                    <input type="file" id="pic" name="pic" style="display:none" onchange="document.getElementById('filename').value=this.value">
                    <input type="text" id="filename" class="form-control" name="gambarlogo" placeholder="masukkan Gambar Logo "onclick="">
                    <input type="button" class="btn btn-primary " style="position: relative;bottom: 38px; left:347px;" value="Pilih Gambar" onclick="document.getElementById('pic').click()">
                      
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </div>
          </div>
        </div>
     </form>
        <!-- End Modal Add Product-->
    </div>

  <!-- end add modal -->
  <div class="card-body">
            <?php 
                // Display Response
                if(session()->has('message')){
                ?>
                   <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                      <?= session()->getFlashdata('message') ?>
                   </div>
                <?php
                }
                ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <!-- <th scope="col">Nama Lengkap</th> -->
                        <th scope="col">Metode</th>
                        <th scope="col">Nomor Rekening</th>
                        <th scope="col">Nama Rekening</th>
                        <th scope="col">Logo</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php foreach ($pembayaran as $row):?>
                    <tr>
                        <td scope="row"><?= $i++; ?></td>
                        <td><?= $row['metode'];?></td>
                        <td><?= $row['nomor_rekening']; ?></td>
                        <td><?= $row['namabank'];?></td>
                        <td style="text-align: center"><img width="100px"  src="<?= base_url('assets/logobank/'. $row['gambarlogo']) ; ?>" alt=""></td>
                        <td><a href="#" data-no_pembayaran="<?= $row['no_pembayaran'];?>" 
                                        data-metode="<?= $row['metode'];?>" 
                                        data-nomor_rekening="<?= $row['nomor_rekening'];?>" 
                                        data-namabank="<?= $row['namabank']?>"
                                        data-gambarlogo="<?= $row['gambarlogo'];?>" class="btn btn-outline-primary btn-sm btn-editmetode"   data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                        <a href="#" data-href="<?= site_url('/pembayaran/delete/'.$row['no_pembayaran']); ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- modal edit -->

    <form action="/pembayaran/update" method="post" enctype="multipart/form-data" >
        <div class="modal fade" id="editModalMetodepembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Metode Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <input type="text" name="metode" class="form-control metode" >
                </div>
                <div class="form-group">
                    <label > Nomor rekening </label>
                    <input type="text" name="nomor_rekening" class="form-control nomor_rekening">
                </div>
                <div class="form-group">
                    <label> Nama BANK</label>
                    <input type="text" name="namabank" class="form-control namabank">
                </div>
                <div class="form-group">
                <label>Gambar Logo</label>
                    <input type="file" id="picturre" name="pic" style="display:none" onchange="document.getElementById('file_edit').value=this.value">
                    <input type="text" id="file_edit" class="form-control gambarlogo" name="gambarlogo" onclick="">
                    <input type="button" class="btn btn-primary " style="position: relative;bottom: 38px; left:347px;" value="Pilih Gambar" onclick="document.getElementById('picturre').click()">
                </div>
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="no_pembayaran" id="no_pembayaran" class="form-control no_pembayaran"  >
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </div>
          </div>
        </div>
    </form>


    <!-- end modal edit -->
                <!-- modal delete -->
                <div id="confirm-dialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Metode Pembayaran</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                      <div class="modal-body">
                        <h2 class="h2">Apakah anda Yakin?</h2>
                        <p>Data yang sudah terhapus tidak dapat dikembalikan!</p>
                      </div>
                      <div class="modal-footer">
                        <a href="#" role="button" id="delete-button" class="btn btn-danger">Hapus</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end modal delete -->
                <script>
                    
                </script>

</div>
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script>
    function confirmToDelete(el){
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog").modal('show');
    }
$(document).ready(function(){

// get Edit Product
$('.btn-editmetode').on('click',function(){
    // get data from button edit
    const no_pembayaran = $(this).data('no_pembayaran')
    const metode     = $(this).data('metode');
    const nomor_rekening = $(this).data('nomor_rekening');
    const namabank   = $(this).data('namabank');
    const gambarlogo = $(this).data('gambarlogo');

    // Set data to Form Edit
    $('.no_pembayaran').val(no_pembayaran);
    $('.metode').val(metode);
    $('.nomor_rekening').val(nomor_rekening);
    $('.namabank').val(namabank);
    $('#file_edit').val(gambarlogo);
    // Call Modal Edit
    $('#editModalMetodepembayaran').modal('show');
});

});
                   
   
</script>
<?= $this->endSection(); ?>