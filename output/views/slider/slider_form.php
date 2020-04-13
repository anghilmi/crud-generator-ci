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
        <h2 style="margin-top:0px">Slider <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tgl Slider <?php echo form_error('tgl_slider') ?></label>
            <input type="text" class="form-control" name="tgl_slider" id="tgl_slider" placeholder="Tgl Slider" value="<?php echo $tgl_slider; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
	    <div class="form-group">
            <label for="artikel">Artikel <?php echo form_error('artikel') ?></label>
            <textarea class="form-control" rows="3" name="artikel" id="artikel" placeholder="Artikel"><?php echo $artikel; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
        </div>
	    <input type="hidden" name="id_slider" value="<?php echo $id_slider; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('slider') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>