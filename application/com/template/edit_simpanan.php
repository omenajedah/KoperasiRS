<div class="d-flex justify-content-between">
    <a href="/koperasi/simpanan" class="btn btn-primary align-self-center"><i class="icon-arrow-left"></i> Daftar Simpanan</a>
    <div class="d-flex h1">Edit Simpanan</div>
    <a href="?action=delete" class="btn btn-danger align-self-center"><i class="icon-trash"></i> Delete Simpanan</a>
</div>
<br>
<div class="tab-pane" id="formcontrols">
    <form id="edit-profile" class="form-horizontal" action="/koperasi/tambah/simpanan?action=save" method="post">
        <fieldset>
            <?php
$this->file('cr4');
$key = "1234567";

$sql = "SELECT a.*, b.tgl_transaksi, b.total_transaksi, c.kd_js, c.nama_js, c.nominal_simpanan, d.nama_anggota FROM simpanan a
                LEFT JOIN detail_simpanan b ON a.kd_simpanan = b.kd_simpanan
                LEFT JOIN jenis_simpanan c ON b.kd_js = c.kd_js
                LEFT JOIN anggota d ON a.kd_anggota = d.kd_anggota WHERE a.kd_simpanan = '" . urlencode(rc4($key, $kd)) . "'";
// $simpanan = $this->model('simpanan');
$on = $this->db->query($sql);
$rw = (object) $on;
?>
            <div class="form-group">
                <label class="control-label" for="kode">Kode Simpanan</label>
                <div class="controls">
                    <input type="text" class="form-control" name="kd_simpanan" id="kode" value="<?php echo rc4($key, urldecode($rw->kd_simpanan)); ?>" readonly>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Kode Anggota</label>
                <div class="controls">
                    <select name="kd_anggota" id="kodeA" onchange="sl(this.value)">
                        <option value="">--PILIH--</option>
                        <?php
$sql = "SELECT * FROM anggota";
$on = $this->db->query($sql);
if (!isset($on[0])) {
    $on = array(0 => $on);
}

foreach ($on as $k => $ra) {
    $ra = (object) $ra;
    ?>
                            <option value="<?php echo rc4($key, urldecode($ra->kd_anggota)); ?>" <?php echo (rc4($key, urldecode($rw->kd_anggota)) == rc4($key, urldecode($ra->kd_anggota)) ? "selected=\"selected\"" : ""); ?>><?php echo rc4($key, urldecode($ra->kd_anggota)); ?></option>
                        <?php
}
?>
                    </select>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="nama">Nama Anggota</label>
                <div class="controls">
                    <input type="text" class="form-control" name="nama" id="nama" readonly="readonly" value="<?php echo rc4($key, urldecode($rw->nama_anggota)); ?>">
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Tanggal Simpanan</label>
                <div class="controls">
                    <?php
$ex = explode("-", rc4($key, urldecode($rw->tgl_simpanan)));
$tgl = $ex[2];
$bln = $ex[1];
$thn = $ex[0];
?>
                    <select name="tgl" id="tgl" required>
                        <option value="">Tanggal</option>
                        <?php
for ($d = 1; $d <= 31; $d++) {
    ?>
                            <option value="<?php echo $d; ?>" <?php echo ($tgl == $d ? "selected=\"selected\"" : ""); ?>><?php echo $d; ?></option>
                        <?php }?>
                    </select>
                    <select name="bln" id="bln" required>
                        <option value="">Bulan</option>
                        <?php
for ($d = 1; $d <= 12; $d++) {
    ?>
                            <option value="<?php echo $d; ?>" <?php echo ($bln == $d ? "selected=\"selected\"" : ""); ?>><?php echo $d; ?></option>
                        <?php }?>
                    </select>
                    <select name="thn" id="thn" required>
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
                            <option value="<?php echo $d; ?>" <?php echo ($thn == $d ? "selected=\"selected\"" : ""); ?>><?php echo $d; ?></option>
                        <?php }?>
                    </select>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Jenis Simpanan</label>
                <div class="controls">
                    <select name="kd_js" id="jenis" onchange="ch(this.value)">
                        <option value="">--PILIH--</option>
                        <?php
$sql = "SELECT * FROM jenis_simpanan";
$on = $this->db->query($sql);
if (!isset($on[0])) {
    $on = array(0 => $on);
}

foreach ($on as $k => $ra) {
    $ra = (object) $ra;
    ?>
                            <option value="<?php echo $ra->kd_js; ?>" <?php echo ($rw->kd_js == $ra->kd_js ? "selected=\"selected\"" : ""); ?>><?php echo $ra->nama_js; ?></option>
                        <?php
}
?>
                    </select>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Besar Simpanan</label>
                <div class="controls">
                    <input type="text" class="form-control" name="total_simpanan" id="totalS" value="<?php echo rc4($key, urldecode($rw->total_simpanan)); ?>" required>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Tanggal Transaksi</label>
                <div class="controls">
                    <?php
$ex = explode("-", rc4($key, urldecode($rw->tgl_simpanan)));
$tgl = $ex[2];
$bln = $ex[1];
$thn = $ex[0];
?>
                    <select name="tglT" id="tglT" required>
                        <option value="">Tanggal</option>
                        <?php
for ($d = 1; $d <= 31; $d++) {
    ?>
                            <option value="<?php echo $d; ?>" <?php echo ($tgl == $d ? "selected=\"selected\"" : ""); ?>><?php echo $d; ?></option>
                        <?php }?>
                    </select>
                    <select name="blnT" id="blnT" required>
                        <option value="">Bulan</option>
                        <?php
for ($d = 1; $d <= 12; $d++) {
    ?>
                            <option value="<?php echo $d; ?>" <?php echo ($bln == $d ? "selected=\"selected\"" : ""); ?>><?php echo $d; ?></option>
                        <?php }?>
                    </select>
                    <select name="thnT" id="thnT" required>
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
                            <option value="<?php echo $d; ?>" <?php echo ($thn == $d ? "selected=\"selected\"" : ""); ?>><?php echo $d; ?></option>
                        <?php }?>
                    </select>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Total Transaksi</label>
                <div class="controls">
                    <input type="text" class="form-control" name="total_transaksi" id="totalT" value="<?php echo rc4($key, urldecode($rw->total_transaksi)); ?>" required>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary" id="save"><i class="icon-save"></i> Save</button>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

        </fieldset>
    </form>
</div>