<?= $this->extend('templates/index'); ?>
<?= $this->section('Page_Content');?>


<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"> Profil User</h1>

<div class="card mb-3" style="max-width: 540px;">
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
  <div class="row g-0">

    <div class="col-md-4">
      <img src="/img/undraw_profile_1.svg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <div class="card-header text-center"  >
            Data Profile
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?php echo $users->namalengkap; ?></li>
          <li class="list-group-item"><?php echo $users->email; ?></li>
          <li class="list-group-item"><?php echo $users->jeniskelamin; ?></li>
          <li class="list-group-item"><?php echo $users->notelp; ?></li>
          <li class="list-group-item"><?php echo $users->alamat; ?></li>
       
          <div class="card-footer">
          <a href="#" onclick="confirmToEdit(this)"class="btn btn-outline-info"data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
          </div>
          <li class="list-group-item">
              <small class="text-muted">
                <a href="<?= base_url('admin')?>">&laquo;kembali ke List User</a>
              </small></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- modal edit -->
<form action="<?php echo base_url('update/user/');?>" method="post">
        <div class="modal fade" id="editModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
             
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="Namalengkap" class="form-control form-control-user" value="<?php echo $users->namalengkap; ?>">
                </div>
                <div class="form-group">
                    <label > Email </label>
                    <input type="email" name="Email" class="form-control form-control-user" value="<?php echo $users->email; ?>">
                </div>
                <div class="form-group">
                      <label> Jenis Kelamin</label>
                     <select name="Jeniskelamin" class="form-control form-control-user">  
                         <option value="laki-laki"<?= ($users->jeniskelamin =="laki-laki"? "selected" : "");?> class="form-control form-control-user">Laki Laki </option>
                         <option value="perempuan"<?= ($users->jeniskelamin =="perempuan"? "selected" : "");?> class="form-control form-control-user">Perempuan</option>
                     </select>
                </div>
                <div class="form-group">
                    <label> Nomor Telephone</label>
                    <input type="number" name="Notelp" class="form-control form-control-user" value="<?php echo $users->notelp; ?>">
                </div>
                <div class="form-group">
                    <label> Alamat </label>
                    <input type="text" name="Alamat" class="form-control form-control-user" value="<?php echo $users->alamat; ?>">
                </div>
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="userid" id="userid" class="form-control"  value="<?php echo $users->userid; ?>">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </div>
          </div>
        </div>
    </form>


    <!-- end modal edit -->
    <script>
      function confirmToEdit(){
        // $("#delete-button").attr("href", el.dataset.href);
        $("#editModalUser").modal('show');
      }
    </script>
</div>

<?= $this->endSection(); ?>