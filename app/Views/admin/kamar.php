<?= $this->extend('templates/index'); ?>
<?= $this->section('Page_Content');?>


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">  List Data Kamar</h1>

    <div class="container">
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addModal" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-pencil-alt"></i> Tambah Data Kamar
        </button>
        <!-- add modal input data -->
        <form action="/kamar/input" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kamar Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <input type="text" class="form-control" name="jeniskamar" placeholder="Masukkan Nama Jenis Kamar">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="jumlahkamar" placeholder="Masukkan Jumlah Kamar">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga Kamar">
                </div>
                <div class="form-group">
                    <input type="file" id="pic" name="pic" style="display:none" onchange="document.getElementById('filename').value=this.value"> 
                    <input type="text" id="filename" class="form-control" name="gambar" placeholder="masukkan Gambar Kamar"onclick="">
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
                        <th scope="col">Jenis Kamar</th>
                        <th scope="col">Jumlah Kamar</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Foto Kamar</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php foreach ($kamar as $row):?>
                    <tr>
                        <td scope="row"><?= $i++; ?></td>
                        <td><?= $row['jeniskamar'];?></td>
                        <td><?= $row['jumlahkamar']; ?></td>
                        <td>Rp. <?= $row['harga'];?></td>
                        <td style="text-align: center"><img width="100px"  src="<?= base_url('assets/uploads/'. $row['gambar']) ; ?>" alt=""></td>
                        <td><a href="#" class="btn btn-outline-primary btn-sm btn-edit" data-nokamar="<?= $row['nokamar'];?>" 
                                                                                data-jeniskamar="<?= $row['jeniskamar'];?>" 
                                                                                data-jumlahkamar="<?= $row['jumlahkamar'];?>" 
                                                                                data-harga="<?= $row['harga']?>"
                                                                                data-gambar="<?= $row['gambar'];?>"  data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                        <a href="#" class="btn btn-outline-danger btn-sm btn-delete" data-no="<?= $row['nokamar'];?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<!-- Add Edit Modal -->
    <form action="/kamar/update" method="post" enctype="multipart/form-data" >
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label>Jenis Kamar</label>
                    <input type="text" class="form-control jeniskamar" name="jeniskamar" placeholder="Jenis kamar">
                </div>
                
                <div class="form-group">
                    <label>Jumlah Kamar</label>
                    <input type="text" class="form-control jumlahkamar" name="jumlahkamar" placeholder="Jumlah Kamar">
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control harga" name="harga" placeholder="Harga Kamar">
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" id="picture" name="pic" style="display:none" onchange="document.getElementById('filename_edit').value=this.value">
                    <input type="text" id="filename_edit" class="form-control gambar" name="gambar" placeholder="masukkan Gambar Kamar"onclick="">
                    <input type="button" class="btn btn-primary " style="position: relative;bottom: 38px; left:347px;" value="Pilih Gambar" onclick="document.getElementById('picture').click()">
                     
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="nokamar" class="nokamar">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </div>
          </div>
        </div>
    </form>
<!--  End Edit Modal -->
     <!-- Modal Delete kamar-->
     <form action="/kamar/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kamar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                       <h4>Apakah anda yakin ingin menghapus data kamar ini?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="nokamar" class="noKamar">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
     </form>
    <!-- end modal delete -->
</div>

<?= $this->endSection(); ?>