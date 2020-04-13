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
        <h2 style="margin-top:0px">Penjualan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Barang <?php echo form_error('id_barang') ?></label>
            <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Harga Jual <?php echo form_error('harga_jual') ?></label>
            <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" value="<?php echo $harga_jual; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jmlh Barang <?php echo form_error('jmlh_barang') ?></label>
            <input type="text" class="form-control" name="jmlh_barang" id="jmlh_barang" placeholder="Jmlh Barang" value="<?php echo $jmlh_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Diskon Item <?php echo form_error('diskon_item') ?></label>
            <input type="text" class="form-control" name="diskon_item" id="diskon_item" placeholder="Diskon Item" value="<?php echo $diskon_item; ?>" />
        </div>
	    <input type="hidden" name="id_nota" value="<?php echo $id_nota; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penjualan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>