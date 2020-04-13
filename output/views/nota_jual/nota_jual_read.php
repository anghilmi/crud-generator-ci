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
        <h2 style="margin-top:0px">Nota_jual Read</h2>
        <table class="table">
	    <tr><td>Tgl Jual</td><td><?php echo $tgl_jual; ?></td></tr>
	    <tr><td>Diskon Total</td><td><?php echo $diskon_total; ?></td></tr>
	    <tr><td>Id Grup</td><td><?php echo $id_grup; ?></td></tr>
	    <tr><td>Ongkir</td><td><?php echo $ongkir; ?></td></tr>
	    <tr><td>Status Bayar</td><td><?php echo $status_bayar; ?></td></tr>
	    <tr><td>Rek Bank</td><td><?php echo $rek_bank; ?></td></tr>
	    <tr><td>Nm Konsumen</td><td><?php echo $nm_konsumen; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('nota_jual') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>