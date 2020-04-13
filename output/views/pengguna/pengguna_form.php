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
        <h2 style="margin-top:0px">Pengguna <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tgl Daftar <?php echo form_error('tgl_daftar') ?></label>
            <input type="text" class="form-control" name="tgl_daftar" id="tgl_daftar" placeholder="Tgl Daftar" value="<?php echo $tgl_daftar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sandi <?php echo form_error('sandi') ?></label>
            <input type="text" class="form-control" name="sandi" id="sandi" placeholder="Sandi" value="<?php echo $sandi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Level <?php echo form_error('level') ?></label>
            <input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Aktivasi Admin <?php echo form_error('aktivasi_admin') ?></label>
            <input type="text" class="form-control" name="aktivasi_admin" id="aktivasi_admin" placeholder="Aktivasi Admin" value="<?php echo $aktivasi_admin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto1 <?php echo form_error('foto1') ?></label>
            <input type="text" class="form-control" name="foto1" id="foto1" placeholder="Foto1" value="<?php echo $foto1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Flag <?php echo form_error('flag') ?></label>
            <input type="text" class="form-control" name="flag" id="flag" placeholder="Flag" value="<?php echo $flag; ?>" />
        </div>
	    <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengguna') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>