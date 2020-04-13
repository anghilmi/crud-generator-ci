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
        <h2 style="margin-top:0px">Bantuan_hazmat Read</h2>
        <table class="table">
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Nm Rs</td><td><?php echo $nm_rs; ?></td></tr>
	    <tr><td>Telp Kantor</td><td><?php echo $telp_kantor; ?></td></tr>
	    <tr><td>Jml Pesanan</td><td><?php echo $jml_pesanan; ?></td></tr>
	    <tr><td>Nm Pj</td><td><?php echo $nm_pj; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>No Hp</td><td><?php echo $no_hp; ?></td></tr>
	    <tr><td>Alamat Rs</td><td><?php echo $alamat_rs; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bantuan_hazmat') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>