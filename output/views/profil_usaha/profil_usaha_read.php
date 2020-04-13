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
        <h2 style="margin-top:0px">Profil_usaha Read</h2>
        <table class="table">
	    <tr><td>Nm Usaha</td><td><?php echo $nm_usaha; ?></td></tr>
	    <tr><td>Logo Usaha</td><td><?php echo $logo_usaha; ?></td></tr>
	    <tr><td>Alamat Usaha</td><td><?php echo $alamat_usaha; ?></td></tr>
	    <tr><td>Kec</td><td><?php echo $kec; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Prov</td><td><?php echo $prov; ?></td></tr>
	    <tr><td>Telp Usaha</td><td><?php echo $telp_usaha; ?></td></tr>
	    <tr><td>Link Toko Ol</td><td><?php echo $link_toko_ol; ?></td></tr>
	    <tr><td>Flag</td><td><?php echo $flag; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('profil_usaha') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>