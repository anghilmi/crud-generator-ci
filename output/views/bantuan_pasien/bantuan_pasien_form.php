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
        <h2 style="margin-top:0px">Bantuan_pasien <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Pasien <?php echo form_error('nama_pasien') ?></label>
            <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Nama Pasien" value="<?php echo $nama_pasien; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Pasien <?php echo form_error('alamat_pasien') ?></label>
            <input type="text" class="form-control" name="alamat_pasien" id="alamat_pasien" placeholder="Alamat Pasien" value="<?php echo $alamat_pasien; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto Ktp Pasien <?php echo form_error('foto_ktp_pasien') ?></label>
            <input type="text" class="form-control" name="foto_ktp_pasien" id="foto_ktp_pasien" placeholder="Foto Ktp Pasien" value="<?php echo $foto_ktp_pasien; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto Kk Pasien <?php echo form_error('foto_kk_pasien') ?></label>
            <input type="text" class="form-control" name="foto_kk_pasien" id="foto_kk_pasien" placeholder="Foto Kk Pasien" value="<?php echo $foto_kk_pasien; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Ft Srt Dokter <?php echo form_error('ft_srt_dokter') ?></label>
            <input type="text" class="form-control" name="ft_srt_dokter" id="ft_srt_dokter" placeholder="Ft Srt Dokter" value="<?php echo $ft_srt_dokter; ?>" />
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
	    <a href="<?php echo site_url('bantuan_pasien') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>