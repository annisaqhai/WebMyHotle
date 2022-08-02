<?= $this->extend('templates/index'); ?>
<?= $this->section('Page_Content'); ?>

<!-- Javascript Bootstrap Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js">
</script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Pesan Kamar</h1>
    <div class="container">
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addModal" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-pencil-alt"></i> Pesan Kamar
        </button>
        <!-- add modal input data -->
        <form action="transaks/input" method="post">
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pesan Kamar Anda di Sini</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Jenis Kamar</label>
                                <select class="form-control" name="jeniskamar" id="jeniskamar" required>
                                    <option value="">Pilih Jenis Kamar</option>
                                    <?php foreach ($kamar as $row) : ?>
                                        <option data-harga="<?= $row->harga; ?>" value="<?= $row->nokamar; ?>"><?= $row->jeniskamar; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Kamar</label>
                                <input type="text" id="jmlhkamar" class="form-control" name="jumlahkamar" placeholder="Masukkan Jumlah Kamar">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <div class="input-group">
                                    <input class="form-control py-2 border-right-0 border" name="tanggalmasuk"type="date">
                                    <span class="input-group-append ml-n1">
                                        <div class="input-group-text bg-transparent"><i class="fa fa-calendar-alt"></i></div>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Keluar</label>
                                <div class="input-group">
                                    <input class="form-control py-2 border-right-0 border"  name="tanggalkeluar" type="date">
                                    <span class="input-group-append ml-n1">
                                        <div class="input-group-text bg-transparent"><i class="fa fa-calendar-alt"></i></div>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Lama Menginap</label>
                                <input type="text" class="form-control" name="lama" placeholder="Berapa hari akan menginap">
                            </div>
                            <div class="form-group">
                                <label>Cek Harga</label>
                                <button class="btn btn-primary" type="button" id="btnCek">Cek Harga</button>
                                <input type="text" class="form-control" name="harga" placeholder="Total Harga">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="userid" id="userid" class="form-control"  value="<?=session()->get('userid');?>">
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
        if (session()->has('message')) {
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
                        <th scope="col">Nama Pelanggan</th>
                        <th Scope="col">Jenis Kamar</th>
                        <th scope="col">Jumlah Kamar</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Lama Menginap</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transaksi as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <td><?= $row['namalengkap'] ?></td>
                            <td><?= $row['jeniskamar'] ?></td>
                            <td><?= $row['jumlahkamar']; ?></td>
                            <td><?= $row['tanggalmasuk']; ?></td>
                            <td><?= $row['tanggalkeluar']; ?></td>
                            <td><?= $row['lamamenginap']; ?> </td>
                            <td><?= $row['totalharga']; ?></td>
                            <td>
                            <a href="<?= base_url('/pdf/cetak/'.$row['no_transaksi']);?>" class="btn btn-outline-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Cetak Transaksi"><i class="fas fa-print"></i></a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-outline-danger btn-sm btn-delete" data-notransaksi="<?= $row['no_transaksi'];?>"data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Transaksi"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Date Picker -->
  <!-- Modal Delete Transaksi-->
  <form action="transaksi/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                       <h4>Apakah anda yakin ingin menghapus data kamar ini?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="no_transaksi" class="no_transaksi">
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


<?= $this->section('js'); ?>
<script>
    $(document).ready(function() {
        $("#btnCek").click(function(e) {

            var harga  = $('select[name="jeniskamar"]').find('option:selected').data('harga');
            var jumlah =$('input[name="jumlahkamar"]').val();
            var lama   = $('input[name="lama"]').val();


            var total = harga * jumlah * lama;

            $('input[name="harga"]').val(total);
            
        });

        // get Delete data Transaksi
            $('.btn-delete').on('click',function(){
            // get data from button delete
            const notransaksi = $(this).data('notransaksi');
            // Set data to Form Edit
            $('.no_transaksi').val(notransaksi);
            // Call Modal delete transaksi
            $('#deleteModal').modal('show');
        });

    });
</script>
<?= $this->endSection(); ?>