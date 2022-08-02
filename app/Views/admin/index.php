<?= $this->extend('templates/index'); ?>
<?= $this->section('Page_Content');?>


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User List</h1>

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
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Nomor Telephone</th>
                        <th scope="col">Alamat </th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php foreach ($users as $user):?>
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <td><?php echo $user['namalengkap']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['jeniskelamin'] ?></td>
                            <td><?php echo $user['notelp']; ?></td>
                            <td><?php echo $user['alamat']; ?></td>
                            <td >
                                <a href="<?= base_url('admin/detail/'.$user['userid']);?>" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail User"> <i class="fas fa-id-card"></i></a>
                            </td>
                            <td>
                                <a href="#" data-href="<?= site_url('admin/delete/'.$user['userid']); ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"><i class="fas fa-trash-alt"></i></a>
                            </td>
                     
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- modal delete -->
                <div id="confirm-dialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Akun User</h5>
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
                    function confirmToDelete(el){
                        $("#delete-button").attr("href", el.dataset.href);
                        $("#confirm-dialog").modal('show');
                    }

                </script>
            </div>
        </div>               

</div>

<?= $this->endSection(); ?>