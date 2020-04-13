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
        <h2 style="margin-top:0px">Spek_membership Read</h2>
        <table class="table">
	    <tr><td>Setting Jml Anggota</td><td><?php echo $setting_jml_anggota; ?></td></tr>
	    <tr><td>Setting Jml Kategori</td><td><?php echo $setting_jml_kategori; ?></td></tr>
	    <tr><td>Setting Jml Gudang</td><td><?php echo $setting_jml_gudang; ?></td></tr>
	    <tr><td>Setting Jml Barang</td><td><?php echo $setting_jml_barang; ?></td></tr>
	    <tr><td>Setting Jml Foto Brg</td><td><?php echo $setting_jml_foto_brg; ?></td></tr>
	    <tr><td>Flag</td><td><?php echo $flag; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('spek_membership') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>