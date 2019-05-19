<div class="d-flex justify-content-between">
    <a href="/koperasi/pinjaman" class="btn btn-primary align-self-center"><i class="icon-arrow-left"></i> Daftar Pinjaman</a>
    <div class="d-flex h1">Edit Pinjaman</div>
    <a href="?action=delete" class="btn btn-danger align-self-center"><i class="icon-trash"></i> Delete Pinjaman</a>
</div>
<br>
<div class="tab-pane" id="formcontrols">
    <form id="edit-profile" class="form-horizontal" action="/koperasi/tambah/pinjaman?action=save" method="post">
        <fieldset>
            <?php
    $this->file('cr4');
    $key = "1234567";

    $qry = "SELECT * FROM pinjaman a
            left join detail_pinjaman b on a.kd_pinjaman = b.kd_pinjaman
            left join anggota d on a.kd_anggota = d.kd_anggota WHERE a.kd_pinjaman = '" . urlencode(rc4($key, $kd)) . "'";
    $on = $this->db->query($qry);
    $rw = (object) $on;
    ?>
            <div class="form-group">
                <label class="control-label" for="kode">Kode Pinjaman</label>
                <div class="controls">
                    <input type="text" class="form-control" name="kode" id="kode" value="<?php echo rc4($key, urldecode($rw->kd_pinjaman)); ?>" readonly>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Kode Anggota</label>
                <div class="controls">
                    <select name="kd_anggota" id="kodeA" onchange="sl(this.value)">
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
                <label class="control-label" for="NIK">Tanggal Pinjaman</label>
                <div class="controls">
                <?php

    $ex = explode("-", rc4($key, urldecode($rw->tgl_pinjaman)));
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
                <label class="control-label" for="NIK">Jenis Pinjaman</label>
                <div class="controls">
                    <select name="jenis" id="jenis" onchange="ch(this.value)">
                        <option value="">--PILIH--</option>
                        <?php
    $qry = "SELECT * FROM jenis_pinjaman";
    $on = $this->db->query($sql);
    if (!isset($on[0])) {
        $on = array(0 => $on);
    }

    foreach ($on as $k => $ra) {
        $ra = (object) $ra;
        ?>
                        <option value="<?php echo $ra->kd_jp; ?>" <?php echo ($rw->kd_jp == $ra->kd_jp ? "selected=\"selected\"" : ""); ?>><?php echo $ra->nama_jp; ?></option>
                        <?php

    }
    ?>
                    </select>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Jasa</label>
                <div class="controls">
                    <input type="text" class="form-control" name="bunga" id="bunga" value="1.5%" required readonly>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Total Pinjaman</label>
                <div class="controls">
                    <input type="text" class="form-control" name="totalS" id="totalS" value="<?php echo rc4($key, urldecode($rw->total_pinjaman)); ?>" required>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Tanggal Transaksi</label>
                <div class="controls">
                <?php

    $ex = explode("-", rc4($key, urldecode($rw->tgl_pinjaman)));
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
                    <input type="text" class="form-control" name="totalT" id="totalT" value="<?php echo rc4($key, urldecode($rw->total_transaksi)); ?>" required>
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