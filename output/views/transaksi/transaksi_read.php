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
        <h2 style="margin-top:0px">Transaksi Read</h2>
        <table class="table">
	    <tr><td>Id Transaksi</td><td><?php echo $id_transaksi; ?></td></tr>
	    <tr><td>Id Grup</td><td><?php echo $id_grup; ?></td></tr>
	    <tr><td>Tgl Trans</td><td><?php echo $tgl_trans; ?></td></tr>
	    <tr><td>Id Barang</td><td><?php echo $id_barang; ?></td></tr>
	    <tr><td>Jml Barang</td><td><?php echo $jml_barang; ?></td></tr>
	    <tr><td>Potongan Item</td><td><?php echo $potongan_item; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>