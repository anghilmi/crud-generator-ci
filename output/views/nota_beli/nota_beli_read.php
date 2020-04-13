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
        <h2 style="margin-top:0px">Nota_beli Read</h2>
        <table class="table">
	    <tr><td>Tgl Beli</td><td><?php echo $tgl_beli; ?></td></tr>
	    <tr><td>Id Grup</td><td><?php echo $id_grup; ?></td></tr>
	    <tr><td>Nm Suplier</td><td><?php echo $nm_suplier; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('nota_beli') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>