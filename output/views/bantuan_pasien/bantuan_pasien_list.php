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
        <h2 style="margin-top:0px">Bantuan_pasien List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('bantuan_pasien/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('bantuan_pasien/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('bantuan_pasien'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Pasien</th>
		<th>Alamat Pasien</th>
		<th>Foto Ktp Pasien</th>
		<th>Foto Kk Pasien</th>
		<th>Deskripsi</th>
		<th>Ft Srt Dokter</th>
		<th>Status</th>
		<th>Keterangan</th>
		<th>Action</th>
            </tr><?php
            foreach ($bantuan_pasien_data as $bantuan_pasien)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $bantuan_pasien->id_user ?></td>
			<td><?php echo $bantuan_pasien->nama_pasien ?></td>
			<td><?php echo $bantuan_pasien->alamat_pasien ?></td>
			<td><?php echo $bantuan_pasien->foto_ktp_pasien ?></td>
			<td><?php echo $bantuan_pasien->foto_kk_pasien ?></td>
			<td><?php echo $bantuan_pasien->deskripsi ?></td>
			<td><?php echo $bantuan_pasien->ft_srt_dokter ?></td>
			<td><?php echo $bantuan_pasien->status ?></td>
			<td><?php echo $bantuan_pasien->keterangan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('bantuan_pasien/read/'.$bantuan_pasien->id_report),'Read'); 
				echo ' | '; 
				echo anchor(site_url('bantuan_pasien/update/'.$bantuan_pasien->id_report),'Update'); 
				echo ' | '; 
				echo anchor(site_url('bantuan_pasien/delete/'.$bantuan_pasien->id_report),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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