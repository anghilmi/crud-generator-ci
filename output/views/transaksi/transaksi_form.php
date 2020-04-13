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
        <h2 style="margin-top:0px">Transaksi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Transaksi <?php echo form_error('id_transaksi') ?></label>
            <input type="text" class="form-control" name="id_transaksi" id="id_transaksi" placeholder="Id Transaksi" value="<?php echo $id_transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Grup <?php echo form_error('id_grup') ?></label>
            <input type="text" class="form-control" name="id_grup" id="id_grup" placeholder="Id Grup" value="<?php echo $id_grup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl Trans <?php echo form_error('tgl_trans') ?></label>
            <input type="text" class="form-control" name="tgl_trans" id="tgl_trans" placeholder="Tgl Trans" value="<?php echo $tgl_trans; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Barang <?php echo form_error('id_barang') ?></label>
            <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jml Barang <?php echo form_error('jml_barang') ?></label>
            <input type="text" class="form-control" name="jml_barang" id="jml_barang" placeholder="Jml Barang" value="<?php echo $jml_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Potongan Item <?php echo form_error('potongan_item') ?></label>
            <input type="text" class="form-control" name="potongan_item" id="potongan_item" placeholder="Potongan Item" value="<?php echo $potongan_item; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>