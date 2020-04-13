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
        <h2 style="margin-top:0px">Penjualan Read</h2>
        <table class="table">
	    <tr><td>Id Barang</td><td><?php echo $id_barang; ?></td></tr>
	    <tr><td>Harga Jual</td><td><?php echo $harga_jual; ?></td></tr>
	    <tr><td>Jmlh Barang</td><td><?php echo $jmlh_barang; ?></td></tr>
	    <tr><td>Diskon Item</td><td><?php echo $diskon_item; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penjualan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>