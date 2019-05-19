<div class="d-flex justify-content-between">
	<a href="/koperasi/anggota" class="btn btn-primary align-self-center"><i class="icon-arrow-left"></i> Daftar Anggota</a>
	<div class="d-flex h1">Tambah Anggota</div>
	<a href="/koperasi/anggota" class="btn btn-primary align-self-center disabled invisible"><i class="icon-arrow-left"></i> Daftar Anggota</a>
</div>
<br>
<div class="tab-pane" id="formcontrols">
	<form id="edit-profile" name="encoder" class="form-horizontal" action="" method="post">
		<fieldset>

			<div class="form-group">
				<label class="control-labe  l" for="NIK">NIK</label>
				<input type="text" class="form-control" name="NIK" id="NIK" required>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="nama_anggota">Nama Anggota</label>
				<input type="text" class="form-control" name="nama_anggota" id="nama_anggota" required>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="username">Username</label>
				<input type="text" class="form-control" name="username" id="username" required>
			</div> <!-- /form-group -->
			<div class="form-group">
				<label class="control-label" for="password">Password</label>
				<input type="password" class="form-control" name="password" id="password" required>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="form-inline">Tanggal Lahir</label>
				<div class="form-inline">
					<select class="form-control" name="tgl" id="tgl" required>
						<option value="">Tanggal</option>
						<?php for ($d = 1; $d <= 31; $d++) {?>
							<option value="<?php echo $d; ?>"><?php echo $d; ?></option>
						<?php }?>
					</select>
					<select class="form-control" name="bln" id="bln" required>
						<option value="">Bulan</option>
						<?php for ($d = 1; $d <= 12; $d++) {?>
							<option value="<?php echo $d; ?>"><?php echo $d; ?></option>
						<?php }?>
					</select>
					<select class="form-control" name="thn" id="thn" required>
						<option value="">Tahun</option>
						<?php for ($d = 1957; $d <= 2017; $d++) {?>
							<option value="<?php echo $d; ?>"><?php echo $d; ?></option>
						<?php }?>
					</select>
				</div> <!-- /controls -->
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="tmp_lahir">Tempat Lahir</label>
				<input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" required>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<div class="custom-control custom-radio">
					<input id="jenkel_l" name="jenkel" type="radio" value="L">
					<label class="control-label" for="jenkel_l">Laki - Laki</label>
				</div>
				<div class="custom-control custom-radio">
					<input id="jenkel_p" name="jenkel" type="radio" value="P">
					<label class="control-label" for="jenkel_p">Perempuan</label>
				</div>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="no_hp">No. HP</label>
				<input type="text" class="form-control" name="no_hp" id="no_hp" required>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="alamat">Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" required></textarea>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="status_keluarga">Status Dalam Keluarga</label>
				<input type="text" class="form-control" name="status_keluarga" id="status_keluarga">
			</div> <!-- /form-group -->

			<button type="submit" class="btn btn-primary" id="save"><i class="icon-save" aria-hidden="true"></i> Save</button>
		
		</fieldset>
	</form>
</div>