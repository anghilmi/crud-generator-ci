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
        <h2 style="margin-top:0px">Anggota_tenant <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Pengguna <?php echo form_error('id_pengguna') ?></label>
            <input type="text" class="form-control" name="id_pengguna" id="id_pengguna" placeholder="Id Pengguna" value="<?php echo $id_pengguna; ?>" />
        </div>
	    <input type="hidden" name="id_tenant" value="<?php echo $id_tenant; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('anggota_tenant') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>