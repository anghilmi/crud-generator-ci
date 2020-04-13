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
        <h2 style="margin-top:0px">Bantuan_hazmat List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('bantuan_hazmat/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('bantuan_hazmat/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('bantuan_hazmat'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id User</th>
		<th>Nm Rs</th>
		<th>Telp Kantor</th>
		<th>Jml Pesanan</th>
		<th>Nm Pj</th>
		<th>Jabatan</th>
		<th>No Hp</th>
		<th>Alamat Rs</th>
		<th>Status</th>
		<th>Keterangan</th>
		<th>Action</th>
            </tr><?php
            foreach ($bantuan_hazmat_data as $bantuan_hazmat)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $bantuan_hazmat->id_user ?></td>
			<td><?php echo $bantuan_hazmat->nm_rs ?></td>
			<td><?php echo $bantuan_hazmat->telp_kantor ?></td>
			<td><?php echo $bantuan_hazmat->jml_pesanan ?></td>
			<td><?php echo $bantuan_hazmat->nm_pj ?></td>
			<td><?php echo $bantuan_hazmat->jabatan ?></td>
			<td><?php echo $bantuan_hazmat->no_hp ?></td>
			<td><?php echo $bantuan_hazmat->alamat_rs ?></td>
			<td><?php echo $bantuan_hazmat->status ?></td>
			<td><?php echo $bantuan_hazmat->keterangan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('bantuan_hazmat/read/'.$bantuan_hazmat->id_report),'Read'); 
				echo ' | '; 
				echo anchor(site_url('bantuan_hazmat/update/'.$bantuan_hazmat->id_report),'Update'); 
				echo ' | '; 
				echo anchor(site_url('bantuan_hazmat/delete/'.$bantuan_hazmat->id_report),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>