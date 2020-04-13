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
        <h2 style="margin-top:0px">Bantuan_hazmat <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Rs <?php echo form_error('nm_rs') ?></label>
            <input type="text" class="form-control" name="nm_rs" id="nm_rs" placeholder="Nm Rs" value="<?php echo $nm_rs; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telp Kantor <?php echo form_error('telp_kantor') ?></label>
            <input type="text" class="form-control" name="telp_kantor" id="telp_kantor" placeholder="Telp Kantor" value="<?php echo $telp_kantor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jml Pesanan <?php echo form_error('jml_pesanan') ?></label>
            <input type="text" class="form-control" name="jml_pesanan" id="jml_pesanan" placeholder="Jml Pesanan" value="<?php echo $jml_pesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Pj <?php echo form_error('nm_pj') ?></label>
            <input type="text" class="form-control" name="nm_pj" id="nm_pj" placeholder="Nm Pj" value="<?php echo $nm_pj; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Rs <?php echo form_error('alamat_rs') ?></label>
            <input type="text" class="form-control" name="alamat_rs" id="alamat_rs" placeholder="Alamat Rs" value="<?php echo $alamat_rs; ?>" />
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
	    <a href="<?php echo site_url('bantuan_hazmat') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>