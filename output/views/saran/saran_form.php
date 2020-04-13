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
        <h2 style="margin-top:0px">Saran <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tgl Saran <?php echo form_error('tgl_saran') ?></label>
            <input type="text" class="form-control" name="tgl_saran" id="tgl_saran" placeholder="Tgl Saran" value="<?php echo $tgl_saran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="saran">Saran <?php echo form_error('saran') ?></label>
            <textarea class="form-control" rows="3" name="saran" id="saran" placeholder="Saran"><?php echo $saran; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Catatan <?php echo form_error('catatan') ?></label>
            <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Catatan" value="<?php echo $catatan; ?>" />
        </div>
	    <input type="hidden" name="id_saran" value="<?php echo $id_saran; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('saran') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>