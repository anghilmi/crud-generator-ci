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
        <h2 style="margin-top:0px">Barang Read</h2>
        <table class="table">
	    <tr><td>Id Grup</td><td><?php echo $id_grup; ?></td></tr>
	    <tr><td>Id Kategori</td><td><?php echo $id_kategori; ?></td></tr>
	    <tr><td>Id Tenant</td><td><?php echo $id_tenant; ?></td></tr>
	    <tr><td>Nm Barang</td><td><?php echo $nm_barang; ?></td></tr>
	    <tr><td>User Last Edit</td><td><?php echo $user_last_edit; ?></td></tr>
	    <tr><td>Foto1</td><td><?php echo $foto1; ?></td></tr>
	    <tr><td>Link Toko Ol</td><td><?php echo $link_toko_ol; ?></td></tr>
	    <tr><td>Visibilitas</td><td><?php echo $visibilitas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>