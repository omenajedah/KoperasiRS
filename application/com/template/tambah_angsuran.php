<?php
$this->file('cr4');
$key = "1234567";
?>
<div class="d-flex justify-content-between">
	<a href="/koperasi/angsuran" class="btn btn-primary align-self-center"><i class="icon-arrow-left"></i> Daftar Angsuran</a>
	<div class="d-flex h1">Tambah Angsuran</div>
	<a href="/koperasi/angsuran" class="btn btn-primary align-self-center disabled invisible"><i class="icon-arrow-left"></i> Daftar Angsuran</a>
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
					$qry = "SELECT * FROM anggota";
					$on = $this->db->query($qry);
					if (!isset($on[0])) {
						$on = array(0 => $on);
					}
					
					foreach ($on as $k => $ra) {
						$ra = (object) $ra;
					?>
					<option value="<?php echo rc4($key, urldecode($ra->kd_anggota)); ?>"><?php echo rc4($key, urldecode($ra->kd_anggota)); ?></option>
					<?php }?>
				</select>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="nama">Nama Anggota</label>
				<input type="text" class="form-control" name="nama" id="nama" readonly="readonly">
			</div> <!-- /form-group -->

			 <div class="form-group">
				<label class="control-label">Jatuh Tempo</label>
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
				<label class="control-label">Tanggal Angsuran</label>
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
				<label class="control-label" for="tahap_angsuran">Angsuran Ke</label>
				<select class="form-control" name="tahap_angsuran" id="tahap_angsuran">
					<option value="">--PILIH--</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
				</select>
			</div> <!-- /form-group -->

			<div class="form-group">
				<label class="control-label" for="total">Total Angsuran</label>
				<input type="text" class="form-control" name="total_angsuran" id="total" required>
			</div> <!-- /form-group -->

			<button type="submit" class="btn btn-primary" id="save"><i class="icon-save" aria-hidden="true"></i> Save</button>
	
		</fieldset>
	</form>
</div>