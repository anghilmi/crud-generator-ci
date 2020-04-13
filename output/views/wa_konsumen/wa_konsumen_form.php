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
        <h2 style="margin-top:0px">Wa_konsumen <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Grup <?php echo form_error('id_grup') ?></label>
            <input type="text" class="form-control" name="id_grup" id="id_grup" placeholder="Id Grup" value="<?php echo $id_grup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Konsumen <?php echo form_error('nm_konsumen') ?></label>
            <input type="text" class="form-control" name="nm_konsumen" id="nm_konsumen" placeholder="Nm Konsumen" value="<?php echo $nm_konsumen; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Wa <?php echo form_error('no_wa') ?></label>
            <input type="text" class="form-control" name="no_wa" id="no_wa" placeholder="No Wa" value="<?php echo $no_wa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Visibility <?php echo form_error('visibility') ?></label>
            <input type="text" class="form-control" name="visibility" id="visibility" placeholder="Visibility" value="<?php echo $visibility; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('wa_konsumen') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>