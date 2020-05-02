<div class="content-wrapper">
	<section class="content">
		<?php foreach ($anggota as $anggota) { ?>

		<form action="<?php echo base_url().'anggota/update'; ?>" method="post">
			
			<div class="form-group">
				<label>No Induk</label>
				<input type="hidden" name="id_anggota" class="form-control"	value="<?php echo $anggota->id_anggota ?>">
				<input type="text" name="no_induk" class="form-control"	value="<?php echo $anggota->no_induk ?>">
			</div>
			<div class="form-group">
				<label>Nama Anggota</label>
				<input type="text" name="nama" class="form-control"	value="<?php echo $anggota->nama ?>">
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<select class="form-control" name="kelas" value="<?php echo $anggota->kelas ?>">
                <option>X MIPA</option>
                <option>X IPS.1</option>
                <option>X IPS.2</option>
                <option>X BB</option>
                <option>XI MIPA</option>
                <option>XI IPS.1</option>
                <option>XI IPS.2</option>
                <option>XI BB</option>
                <option>XII MIPA</option>
                <option>XII IPS.1</option>
                <option>XII IPS.2</option>
                <option>XII BB</option>
              </select>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" name="alamat" class="form-control" value="<?php echo $anggota->alamat ?>">
			</div>
			<div class="form-group">
				<label>No Telepon</label>
				<input type="text" name="no_telp" class="form-control" value="<?php echo $anggota->no_telp ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="<?php echo $anggota->email ?>">
			</div>
			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $anggota->tgl_lahir ?>">
			</div>

			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="<?php echo base_url('anggota/index'); ?>" class="btn btn-success">Kembali</a>
		</form>
		<?php } ?>
	</section>
</div>