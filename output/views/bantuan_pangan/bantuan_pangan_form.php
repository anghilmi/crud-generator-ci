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
        <h2 style="margin-top:0px">Bantuan_pangan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Penerima <?php echo form_error('alamat_penerima') ?></label>
            <input type="text" class="form-control" name="alamat_penerima" id="alamat_penerima" placeholder="Alamat Penerima" value="<?php echo $alamat_penerima; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
            <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kab Kota <?php echo form_error('kab_kota') ?></label>
            <input type="text" class="form-control" name="kab_kota" id="kab_kota" placeholder="Kab Kota" value="<?php echo $kab_kota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <input type="hidden" name="id_report" value="<?php echo $id_report; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bantuan_pangan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>