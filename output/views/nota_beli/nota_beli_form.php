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
        <h2 style="margin-top:0px">Nota_beli <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tgl Beli <?php echo form_error('tgl_beli') ?></label>
            <input type="text" class="form-control" name="tgl_beli" id="tgl_beli" placeholder="Tgl Beli" value="<?php echo $tgl_beli; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Grup <?php echo form_error('id_grup') ?></label>
            <input type="text" class="form-control" name="id_grup" id="id_grup" placeholder="Id Grup" value="<?php echo $id_grup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Suplier <?php echo form_error('nm_suplier') ?></label>
            <input type="text" class="form-control" name="nm_suplier" id="nm_suplier" placeholder="Nm Suplier" value="<?php echo $nm_suplier; ?>" />
        </div>
	    <input type="hidden" name="id_nota" value="<?php echo $id_nota; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nota_beli') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>