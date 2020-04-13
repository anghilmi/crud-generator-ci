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
        <h2 style="margin-top:0px">Wa_konsumen Read</h2>
        <table class="table">
	    <tr><td>Id Grup</td><td><?php echo $id_grup; ?></td></tr>
	    <tr><td>Nm Konsumen</td><td><?php echo $nm_konsumen; ?></td></tr>
	    <tr><td>No Wa</td><td><?php echo $no_wa; ?></td></tr>
	    <tr><td>Visibility</td><td><?php echo $visibility; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wa_konsumen') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>