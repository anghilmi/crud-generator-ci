<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Bantuan_pasien Read</h2>
        <table class="table">
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Nama Pasien</td><td><?php echo $nama_pasien; ?></td></tr>
	    <tr><td>Alamat Pasien</td><td><?php echo $alamat_pasien; ?></td></tr>
	    <tr><td>Foto Ktp Pasien</td><td><?php echo $foto_ktp_pasien; ?></td></tr>
	    <tr><td>Foto Kk Pasien</td><td><?php echo $foto_kk_pasien; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td>Ft Srt Dokter</td><td><?php echo $ft_srt_dokter; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bantuan_pasien') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>