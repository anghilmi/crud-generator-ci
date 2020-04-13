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
        <h2 style="margin-top:0px">Profil_usaha List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('profil_usaha/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('profil_usaha/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('profil_usaha'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nm Usaha</th>
		<th>Logo Usaha</th>
		<th>Alamat Usaha</th>
		<th>Kec</th>
		<th>Kota</th>
		<th>Prov</th>
		<th>Telp Usaha</th>
		<th>Link Toko Ol</th>
		<th>Flag</th>
		<th>Action</th>
            </tr><?php
            foreach ($profil_usaha_data as $profil_usaha)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $profil_usaha->nm_usaha ?></td>
			<td><?php echo $profil_usaha->logo_usaha ?></td>
			<td><?php echo $profil_usaha->alamat_usaha ?></td>
			<td><?php echo $profil_usaha->kec ?></td>
			<td><?php echo $profil_usaha->kota ?></td>
			<td><?php echo $profil_usaha->prov ?></td>
			<td><?php echo $profil_usaha->telp_usaha ?></td>
			<td><?php echo $profil_usaha->link_toko_ol ?></td>
			<td><?php echo $profil_usaha->flag ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('profil_usaha/read/'.$profil_usaha->id_grup),'Read'); 
				echo ' | '; 
				echo anchor(site_url('profil_usaha/update/'.$profil_usaha->id_grup),'Update'); 
				echo ' | '; 
				echo anchor(site_url('profil_usaha/delete/'.$profil_usaha->id_grup),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('profil_usaha/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>