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
        <h2 style="margin-top:0px">Spek_membership <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Setting Jml Anggota <?php echo form_error('setting_jml_anggota') ?></label>
            <input type="text" class="form-control" name="setting_jml_anggota" id="setting_jml_anggota" placeholder="Setting Jml Anggota" value="<?php echo $setting_jml_anggota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Setting Jml Kategori <?php echo form_error('setting_jml_kategori') ?></label>
            <input type="text" class="form-control" name="setting_jml_kategori" id="setting_jml_kategori" placeholder="Setting Jml Kategori" value="<?php echo $setting_jml_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Setting Jml Gudang <?php echo form_error('setting_jml_gudang') ?></label>
            <input type="text" class="form-control" name="setting_jml_gudang" id="setting_jml_gudang" placeholder="Setting Jml Gudang" value="<?php echo $setting_jml_gudang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Setting Jml Barang <?php echo form_error('setting_jml_barang') ?></label>
            <input type="text" class="form-control" name="setting_jml_barang" id="setting_jml_barang" placeholder="Setting Jml Barang" value="<?php echo $setting_jml_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Setting Jml Foto Brg <?php echo form_error('setting_jml_foto_brg') ?></label>
            <input type="text" class="form-control" name="setting_jml_foto_brg" id="setting_jml_foto_brg" placeholder="Setting Jml Foto Brg" value="<?php echo $setting_jml_foto_brg; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Flag <?php echo form_error('flag') ?></label>
            <input type="text" class="form-control" name="flag" id="flag" placeholder="Flag" value="<?php echo $flag; ?>" />
        </div>
	    <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('spek_membership') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>