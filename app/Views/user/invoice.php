<p style="font-size:18pt;text-align:right">TRANSAKSI</p>
<span>Kepada Yth.</span><br/>
<table cellpadding="0" >
    <tr>
        <th width="10%">Nama</th>
        <th width="40%">: <strong><?=session()->get('namalengkap');?></strong></th>
        <th width="19%">Sales</th>
        <th width="40%">: <strong>Administrator</strong></th>
    </tr>
    <tr>
        <th width="10%">Alamat</th>
        <th width="40%">: <strong><?=session()->get('alamat');?></strong></th>
        <th width="19%">No.Transaksi</th>
        <th width="40%">: <strong><?php echo $transaksi->no_transaksi; ?></strong></th>
    </tr>
    <tr>
        <th width="10%">Telp</th>
        <th width="40%">: <strong><?=session()->get('notelp');?></strong></th>
        <th width="19%">Tanggal</th>
        <th width="40%">: <strong><?php $tgl=date('d-m-Y'); echo $tgl; ?></strong></th>
    </tr>
</table>
<p></p>
<table id="tb-item" cellpadding="4" >
    <tr style="background-color:#a9a9a9">
        <th width="30%" style="height: 20px"><strong>Jenis Kamar</strong></th>
        <th width="8%" style="height: 20px;text-align:center"><strong>Qty</strong></th>

        <!-- <th width="12%" style="height: 20px"><strong>Satuan</strong></th> -->
        <th width="15%" style="height: 20px"><strong>Harga</strong></th>
        <th width="15%" style="height: 20px"><strong>Lama</strong></th>
        <th width="20%" style="height: 20px"><strong>Total</strong></th>
    </tr>
    <tr> 
        <td style="height: 20px"><?= $transaksi->jeniskamar?></td>
        <td style="height: 20px;text-align:center">1</td>
        <!-- <td style="height: 20px;">PCS</td> -->
        <td style="height: 20px;text-align:right"><?= $transaksi->harga ?></td>
        <td style="height: 20px;text-align:right"><?= $transaksi->lamamenginap ?></td>
        <td style="height: 20px;text-align:right">Rp. <?= $transaksi->totalharga ?></td>
        
    </tr>
    
    <tr style="border:1px solid #000">
        <td colspan="4" style="height: 20px"><strong> Total Bayar </strong></td>
        <td style="height: 20px;text-align:right"><strong>Rp. <?= $transaksi->totalharga ?></strong></td>
    </tr>
</table>
<!-- <p>Terbilang: Satu Juta Lima Ratus Ribu Rupiah</p> -->
<p><i> PILIH METODE PEMBAYARAN </i></p>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                    <tr style="background-color:#CCCCCC">
                        <th scope="col">Nama Bank</th>
                        <th scope="col">Nomor Rekening</th>
                        <th scope="col">Nama Rekening</th>
                    </tr>
                    <?php foreach ($pembayaran as $row):?>
                    <tr>
                        <td><?= $row['metode'];?></td>
                        <td><?= $row['nomor_rekening']; ?></td>
                        <td><?= $row['namabank'];?></td>
                    </tr>
                    <?php endforeach; ?>
            </table>
<p>&nbsp;</p>
<table cellpadding="4" >
    <tr>
        <td width="50%" style="height: 20px;text-align:center">
            <p>&nbsp;</p>
        </td>
        <td width="50%" style="height: 20px;text-align:center">
            <p>Pekanbaru, <?php $tgl=date('d F Y'); echo $tgl; ?></p>
            <p>Hormat kami,</p>
            <p></p>
            <p></p>
            <p></p>
            <p>MyHotle.com</p>
        </td>
    </tr>
</table>