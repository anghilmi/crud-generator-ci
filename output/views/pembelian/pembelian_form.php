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
        <h2 style="margin-top:0px">Pembelian <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Barang <?php echo form_error('id_barang') ?></label>
            <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Harga Dasar <?php echo form_error('harga_dasar') ?></label>
            <input type="text" class="form-control" name="harga_dasar" id="harga_dasar" placeholder="Harga Dasar" value="<?php echo $harga_dasar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jmlh Barang <?php echo form_error('jmlh_barang') ?></label>
            <input type="text" class="form-control" name="jmlh_barang" id="jmlh_barang" placeholder="Jmlh Barang" value="<?php echo $jmlh_barang; ?>" />
        </div>
	    <input type="hidden" name="id_nota" value="<?php echo $id_nota; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembelian') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>