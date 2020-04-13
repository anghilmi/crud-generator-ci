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
        <h2 style="margin-top:0px">Profil_usaha <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nm Usaha <?php echo form_error('nm_usaha') ?></label>
            <input type="text" class="form-control" name="nm_usaha" id="nm_usaha" placeholder="Nm Usaha" value="<?php echo $nm_usaha; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Logo Usaha <?php echo form_error('logo_usaha') ?></label>
            <input type="text" class="form-control" name="logo_usaha" id="logo_usaha" placeholder="Logo Usaha" value="<?php echo $logo_usaha; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Usaha <?php echo form_error('alamat_usaha') ?></label>
            <input type="text" class="form-control" name="alamat_usaha" id="alamat_usaha" placeholder="Alamat Usaha" value="<?php echo $alamat_usaha; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kec <?php echo form_error('kec') ?></label>
            <input type="text" class="form-control" name="kec" id="kec" placeholder="Kec" value="<?php echo $kec; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Prov <?php echo form_error('prov') ?></label>
            <input type="text" class="form-control" name="prov" id="prov" placeholder="Prov" value="<?php echo $prov; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telp Usaha <?php echo form_error('telp_usaha') ?></label>
            <input type="text" class="form-control" name="telp_usaha" id="telp_usaha" placeholder="Telp Usaha" value="<?php echo $telp_usaha; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Link Toko Ol <?php echo form_error('link_toko_ol') ?></label>
            <input type="text" class="form-control" name="link_toko_ol" id="link_toko_ol" placeholder="Link Toko Ol" value="<?php echo $link_toko_ol; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Flag <?php echo form_error('flag') ?></label>
            <input type="text" class="form-control" name="flag" id="flag" placeholder="Flag" value="<?php echo $flag; ?>" />
        </div>
	    <input type="hidden" name="id_grup" value="<?php echo $id_grup; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('profil_usaha') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>