<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->

                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">DAFTAR AKUN!</h1>
                                </div>                
                                <?php if(!empty(session()->getFlashData('validation'))) :?>
                                        <div class="alert alert-danger"><?= session()->getFlashData('validation') ?></div>
                                 <?php endif;?>
                                <form action="<?= base_url();?>/register/store" method="post">
                                <?= csrf_field();?>
                                    <div class="form-group">
                                        <input type="text" name="Namalengkap" class="form-control form-control-user" id="exampleInputNamalengkap"
                                            placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="Email" class="form-control form-control-user" id="exampleInputEmail"
                                            placeholder="Alamat Email">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="Password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="confpassword" class="form-control form-control-user"
                                                id="exampleRepeatPassword" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <select name="Jeniskelamin" class="form-control form-control-user" id="examplejeniskelamin">
                                             <option value="" class="form-control form-control-user">Jenis Kelamin</option>
                                             <option value="laki laki" class="form-control form-control-user">Laki laki</option>

                                             <option value="perempuan" class="form-control form-control-user">Perempuan</option>
                                         </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="Notelp" class="form-control form-control-user" id="exampleInputNotelp"
                                            placeholder="Nomor Telepone">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="Alamat" class="form-control form-control-user" id="exampleInputAlamat"
                                            placeholder="Alamat">
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit"> DAFTAR </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= route_to('login') ?>">Sudah Punya Akun? Masuk Disini!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
        <?= $this->endSection();?>