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
        <h2 style="margin-top:0px">Nota_jual <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tgl Jual <?php echo form_error('tgl_jual') ?></label>
            <input type="text" class="form-control" name="tgl_jual" id="tgl_jual" placeholder="Tgl Jual" value="<?php echo $tgl_jual; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Diskon Total <?php echo form_error('diskon_total') ?></label>
            <input type="text" class="form-control" name="diskon_total" id="diskon_total" placeholder="Diskon Total" value="<?php echo $diskon_total; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Grup <?php echo form_error('id_grup') ?></label>
            <input type="text" class="form-control" name="id_grup" id="id_grup" placeholder="Id Grup" value="<?php echo $id_grup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ongkir <?php echo form_error('ongkir') ?></label>
            <input type="text" class="form-control" name="ongkir" id="ongkir" placeholder="Ongkir" value="<?php echo $ongkir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Bayar <?php echo form_error('status_bayar') ?></label>
            <input type="text" class="form-control" name="status_bayar" id="status_bayar" placeholder="Status Bayar" value="<?php echo $status_bayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Rek Bank <?php echo form_error('rek_bank') ?></label>
            <input type="text" class="form-control" name="rek_bank" id="rek_bank" placeholder="Rek Bank" value="<?php echo $rek_bank; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Konsumen <?php echo form_error('nm_konsumen') ?></label>
            <input type="text" class="form-control" name="nm_konsumen" id="nm_konsumen" placeholder="Nm Konsumen" value="<?php echo $nm_konsumen; ?>" />
        </div>
	    <input type="hidden" name="id_nota" value="<?php echo $id_nota; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nota_jual') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>