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
        <h2 style="margin-top:0px">Spek_membership List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('spek_membership/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('spek_membership/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('spek_membership'); ?>" class="btn btn-default">Reset</a>
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
		<th>Setting Jml Anggota</th>
		<th>Setting Jml Kategori</th>
		<th>Setting Jml Gudang</th>
		<th>Setting Jml Barang</th>
		<th>Setting Jml Foto Brg</th>
		<th>Flag</th>
		<th>Action</th>
            </tr><?php
            foreach ($spek_membership_data as $spek_membership)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $spek_membership->setting_jml_anggota ?></td>
			<td><?php echo $spek_membership->setting_jml_kategori ?></td>
			<td><?php echo $spek_membership->setting_jml_gudang ?></td>
			<td><?php echo $spek_membership->setting_jml_barang ?></td>
			<td><?php echo $spek_membership->setting_jml_foto_brg ?></td>
			<td><?php echo $spek_membership->flag ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('spek_membership/read/'.$spek_membership->id_pengguna),'Read'); 
				echo ' | '; 
				echo anchor(site_url('spek_membership/update/'.$spek_membership->id_pengguna),'Update'); 
				echo ' | '; 
				echo anchor(site_url('spek_membership/delete/'.$spek_membership->id_pengguna),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('spek_membership/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>