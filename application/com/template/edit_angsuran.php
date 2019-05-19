<?php
$this->file('cr4');

$key = "1234567";
$sql = "SELECT a.*,d.nama_anggota FROM angsuran a 
		LEFT JOIN anggota d on a.kd_anggota = d.kd_anggota 
		WHERE a.kd_angsuran = '" . urlencode(rc4($key, $kd)) . "'";
$on = $this->db->query($sql);
$rw = (object) $on;
?>
<div class="d-flex justify-content-between">
	<a href="/koperasi/angsuran" class="btn btn-primary align-self-center"><i class="icon-arrow-left"></i> Daftar Angsuran</a>
	<div class="d-flex h1">Edit Angsuran</div>
	<form action="/koperasi/tambah/angsuran?action=delete" method="post">
		<input type="text" class="form-control" name="kd_angsuran" id="kd_angsuran" value="<?php echo rc4($key, urldecode($rw->kd_angsuran)); ?>" hidden>
		<button class="btn btn-danger align-self-center"><i class="icon-trash"></i> Delete Angsuran</button>
	</form>
</div>
<br>
<div class="tab-pane" id="formcontrols">
	<form id="edit-profile" class="form-horizontal" action="" method="post">
		<fieldset>
			<div class="form-group">											
				<label class="control-label" for="kode">Kode Angsuran</label>
				<div class="controls">
					<input type="text" class="form-control" name="kode" id="kode" value="<?php echo rc4($key,urldecode($rw->kd_angsuran)) ?>" readonly>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			
			 <div class="form-group">											
				<label class="control-label" for="NIK">Kode Anggota</label>
				<div class="controls">
					<select class="form-control" name="kodeA" id="kodeA" onchange="sl(this.value)">
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
						<option value="<?php echo rc4($key,urldecode($ra->kd_anggota))?>" <?php echo (rc4($key,urldecode($rw->kd_anggota)) == rc4($key,urldecode($ra->kd_anggota)) ? "selected=\"selected\"" : "") ?>><?php echo rc4($key,urldecode($ra->kd_anggota))?></option>
						<?php 
						}
						?>
					</select>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			
			<div class="form-group">											
				<label class="control-label" for="nama">Nama Anggota</label>
				<div class="controls">
					<input type="text" class="form-control" name="nama" id="nama" readonly="readonly" value="<?php echo rc4($key,urldecode($rw->nama_anggota))?>">
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			
			<div class="form-group">											
				<label class="control-label" for="NIK">Tanggal Angsuran</label>
				<div class="form-inline">
				<?php 
				$ex = explode("-",rc4($key,urldecode($rw->tgl_angsuran)));
				$tgl = $ex[2];
				$bln = $ex[1];
				$thn = $ex[0];
				?>
					<select class="form-control" name="tgl" id="tgl" required>
						<option value="">Tanggal</option>
						<?php
						for($d=1;$d<=31;$d++){
						?>
						<option value="<?php echo $d ?>" <?php echo ($tgl == $d ? "selected=\"selected\"" : "") ?>><?php echo $d ?></option>
						<?php } ?>
					</select>
					<select class="form-control" name="bln" id="bln" required>
						<option value="">Bulan</option>
						<?php
						for($d=1;$d<=12;$d++){
						?>
						<option value="<?php echo $d ?>" <?php echo ($bln == $d ? "selected=\"selected\"" : "") ?>><?php echo $d ?></option>
						<?php } ?>
					</select>
					<select class="form-control" name="thn" id="thn" required>
						<option value="">Tahun</option>
						<?php
						$dt = date('Y-m-d');

						$start_date = date ("Y-m-d", strtotime("-3 Year", strtotime($dt)));
									 
						$end_date = date ("Y-m-d", strtotime("+2 Year", strtotime($dt)));
						
						$timestampS = strtotime($start_date);
						$timestampE = strtotime($end_date);
						$yeS = date('Y', $timestampS);
						$yeE = date('Y', $timestampE);
						for($d=$yeS;$d<=$yeE;$d++){
						?>
						<option value="<?php echo $d ?>" <?php echo ($thn == $d ? "selected=\"selected\"" : "") ?>><?php echo $d ?></option>
						<?php } ?>
					</select>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			
			<div class="form-group">											
				<label class="control-label" for="NIK">Jatuh Tempo</label>
				<div class="form-inline">
				<?php 
				$ex = explode("-",rc4($key,urldecode($rw->jatuh_tempo)));
				$tgl = $ex[2];
				$bln = $ex[1];
				$thn = $ex[0];
				?>
					<select class="form-control" name="tglT" id="tglT" required>
						<option value="">Tanggal</option>
						<?php
						for($d=1;$d<=31;$d++){
						?>
						<option value="<?php echo $d ?>" <?php echo ($tgl == $d ? "selected=\"selected\"" : "") ?>><?php echo $d ?></option>
						<?php } ?>
					</select>
					<select class="form-control" name="blnT" id="blnT" required>
						<option value="">Bulan</option>
						<?php
						for($d=1;$d<=12;$d++){
						?>
						<option value="<?php echo $d ?>" <?php echo ($bln == $d ? "selected=\"selected\"" : "") ?>><?php echo $d ?></option>
						<?php } ?>
					</select>
					<select class="form-control" name="thnT" id="thnT" required>
						<option value="">Tahun</option>
						<?php
						$dt = date('Y-m-d');

						$start_date = date ("Y-m-d", strtotime("-3 Year", strtotime($dt)));
									 
						$end_date = date ("Y-m-d", strtotime("+2 Year", strtotime($dt)));
						
						$timestampS = strtotime($start_date);
						$timestampE = strtotime($end_date);
						$yeS = date('Y', $timestampS);
						$yeE = date('Y', $timestampE);
						for($d=$yeS;$d<=$yeE;$d++){
						?>
						<option value="<?php echo $d ?>" <?php echo ($thn == $d ? "selected=\"selected\"" : "") ?>><?php echo $d ?></option>
						<?php } ?>
					</select>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			
			<div class="form-group">											
				<label class="control-label" for="NIK">Tahap Angsuran</label>
				<div class="controls">
					<input type="text" class="form-control" name="tahap" id="tahap" value="<?php echo rc4($key,urldecode($rw->tahap_angsuran))?>" required>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
			
			<div class="form-group">											
				<label class="control-label" for="NIK">Total Angsuran</label>
				<div class="controls">
					<input type="text" class="form-control" name="total" id="total" value="<?php echo rc4($key,urldecode($rw->total_angsuran))?>" required>
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->
		   
			<div class="form-group">		
				<div class="controls">
					<input type="submit" class="btn btn-primary" name="save" id="save" value="SAVE">
				</div> <!-- /controls -->				
			</div> <!-- /form-group -->              
			
		</fieldset>
	</form>
</div>