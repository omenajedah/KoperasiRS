<?php
$this->file('cr4');
$key = "1234567";
?>
<div class="d-flex justify-content-between">
	<a href="/koperasi/simpanan" class="btn btn-primary align-self-center"><i class="icon-arrow-left"></i> Daftar Simpanan</a>
	<div class="d-flex h1">Tambah Simpanan</div>
	<a href="/koperasi/simpanan" class="btn btn-primary align-self-center disabled invisible"><i class="icon-arrow-left"></i> Daftar Simpanan</a>
</div>
<br>
<div class="tab-pane" id="formcontrols">
	<form id="edit-profile" class="form-horizontal" action="" method="post">
		<fieldset>

			<div class="form-group">
				<label class="control-label" for="kodeA">Kode Anggota</label>
				<select class="form-control" name="kd_anggota" id="kodeA" onchange="sl(this.value)">
					<option value="">--PILIH--</option>
					<?php
					$qry = "SELECT * FROM anggota ORDER BY ID DESC";
					$on = $this->db->query($qry);
					if (!isset($on[0])) {
					$on = array(0 => $on);
					}

					foreach ($on as $k => $ra) {
					$ra = (object) $ra;
					?>
					<option value="<?php echo rc4($key, urldecode($ra->kd_anggota)); ?>"><?php echo rc4($key, urldecode($ra->kd_anggota)); ?></option>
					<?php } ?>
				</select>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="nama">Nama Anggota</label>
				<input type="text" class="form-control" name="nama" id="nama" readonly="readonly">
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label">Tanggal Simpanan</label>
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
						<?php
						$dt = date('Y-m-d');

						$start_date = date("Y-m-d", strtotime("-3 Year", strtotime($dt)));

						$end_date = date("Y-m-d", strtotime("+2 Year", strtotime($dt)));

						$timestampS = strtotime($start_date);
						$timestampE = strtotime($end_date);
						$yeS = date('Y', $timestampS);
						$yeE = date('Y', $timestampE);

						for ($d = $yeS; $d <= $yeE; $d++) {
						?>
						<option value="<?php echo $d; ?>"><?php echo $d; ?></option>
						<?php }?>
					</select>
				</div>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="jenis">Jenis Simpanan</label>
				<select class="form-control" name="kd_js" id="jenis" onchange="ch(this.value)">
					<option value="">--PILIH--</option>
					<?php
					$qry = "SELECT * FROM jenis_simpanan";
					$on = $this->db->query($qry);
					if (!isset($on[0])) {
						$on = array(0 => $on);
					}

					foreach ($on as $k => $ra) {
						$ra = (object) $ra;
					?>
					<option value="<?php echo $ra->kd_js; ?>"><?php echo $ra->nama_js; ?></option>
					<?php }?>
				</select>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="NIK">Besar Simpanan</label>
				<input type="text" class="form-control" name="total_simpanan" id="totalS" required>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="NIK">Tanggal Transaksi</label>
				<div class="form-inline">
					<select class="form-control" name="tglT" id="tglT" required>
						<option value="">Tanggal</option>
						<?php for ($d = 1; $d <= 31; $d++) {?>
						<option value="<?php echo $d; ?>"><?php echo $d; ?></option>
						<?php }?>
					</select>
					<select class="form-control" name="blnT" id="blnT" required>
						<option value="">Bulan</option>
						<?php for ($d = 1; $d <= 12; $d++) {?>
						<option value="<?php echo $d; ?>"><?php echo $d; ?></option>
						<?php }?>
					</select>
					<select class="form-control" name="thnT" id="thnT" required>
						<option value="">Tahun</option>
						<?php
						$dt = date('Y-m-d');

						$start_date = date("Y-m-d", strtotime("-3 Year", strtotime($dt)));

						$end_date = date("Y-m-d", strtotime("+2 Year", strtotime($dt)));

						$timestampS = strtotime($start_date);
						$timestampE = strtotime($end_date);
						$yeS = date('Y', $timestampS);
						$yeE = date('Y', $timestampE);
						for ($d = $yeS; $d <= $yeE; $d++) {
						?>
						<option value="<?php echo $d; ?>"><?php echo $d; ?></option>
						<?php }?>
					</select>
				</div>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="NIK">Total Transaksi</label>
				<input type="text" class="form-control" name="total_transaksi" id="totalT" required>
			</div> <!-- /form-group -->
	
			<button type="submit" class="btn btn-primary" id="save"><i class="icon-save"></i> Save</button>

		</fieldset>
	</form>
</div>