<?= $this->extend('templates/index'); ?>
<?= $this->section('Page_Content');?>


<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Profil Saya</h1>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img  src="/img/undraw_profile_1.svg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <div class="card-header">
            <?=session()->get('namalengkap');?>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?=session()->get('email');?></li>
          <li class="list-group-item"><?=session()->get('jeniskelamin');?></li>
          <li class="list-group-item"><?=session()->get('notelp');?></li>
          <li class="list-group-item"><?=session()->get('alamat');?></li>
        </ul>
        <div class="card-footer">
          <a href="#" onclick="confirmToEdit(this)"class="btn btn-outline-info" style="text-align: center" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fas fa-edit"></i></a>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- modal edit -->
<form action="<?php echo base_url('user/update');?>" method="post">
              <?php echo csrf_field(); ?>
        <div class="modal fade" id="editModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
             
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="Namalengkap" class="form-control form-control-user" value="<?=session()->get('namalengkap');?>">
                </div>
                <div class="form-group">
                    <label > Email </label>
                    <input type="email" name="Email" class="form-control form-control-user" value="<?=session()->get('email');?>">
                </div>
                <div class="form-group">
                      <label> Jenis Kelamin</label>
                     <select name="Jeniskelamin" class="form-control form-control-user">  
                         <option value="laki-laki"<?= (session()->jeniskelamin =="laki-laki"? "selected" : "");?> class="form-control form-control-user">Laki Laki </option>
                         <option value="perempuan"<?= (session()->jeniskelamin =="perempuan"? "selected" : "");?> class="form-control form-control-user">Perempuan</option>
                     </select>
                </div>
                <div class="form-group">
                    <label> Nomor Telephone</label>
                    <input type="number" name="Notelp" class="form-control form-control-user" value="<?=session()->get('notelp'); ?>">
                </div>
                <div class="form-group">
                    <label> Alamat </label>
                    <input type="text" name="Alamat" class="form-control form-control-user" value="<?=session()->get('alamat');?>">
                </div>
              </div>
              <div class="modal-footer">
                  <input type="hidden" name="userid" id="userid" class="form-control"  value="<?=session()->get('userid');?>">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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