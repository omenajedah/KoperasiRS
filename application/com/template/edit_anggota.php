<?php
$this->file('cr4');

$key = "1234567";
$sql = "SELECT * FROM anggota WHERE kd_anggota = '" . urlencode(rc4($key, $kd)) . "'";
$on = $this->db->query($sql);
$rw = (object) $on;
?>
<div class="d-flex justify-content-between">
    <a href="/koperasi/anggota" class="btn btn-primary align-self-center"><i class="icon-arrow-left"></i> Daftar Anggota</a>
    <div class="d-flex h1">Edit Anggota</div>
    <form action="/koperasi/tambah/anggota?action=delete" method="post">
        <input type="text" class="form-control" name="kd_anggota" id="kd_anggota" value="<?php echo rc4($key, urldecode($rw->kd_anggota)); ?>" hidden>
        <button class="btn btn-danger align-self-center"><i class="icon-trash"></i> Delete Anggota</button>
    </form>
</div>
<br>
<div class="tab-pane" id="formcontrols">
    <form id="edit-profile" class="form-horizontal" action="/koperasi/tambah/anggota?action=save" method="post">
        <fieldset>

            <div class="form-group">
                <label for="kd_anggota">Kode Anggota</label>
                <input type="text" class="form-control" name="kd_anggota" id="kd_anggota" value="<?php echo rc4($key, urldecode($rw->kd_anggota)); ?>" hidden>
            </div> <!-- /form-group -->

            <div class="form-group">
                <label for="NIK">NIK</label>
                <input type="text" class="form-control" name="NIK" id="NIK" value="<?php echo rc4($key, urldecode($rw->NIK)); ?>" required>
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="nama_anggota">Nama Anggota</label>
                <div class="controls">
                    <input type="text" class="form-control" name="nama_anggota" id="nama_anggota" value="<?php echo rc4($key, urldecode($rw->nama_anggota)); ?>" required>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Tanggal Lahir</label>
                <div class="form-inline">
                    <?php
$ex = explode("-", rc4($key, urldecode($rw->tgl_lahir)));
$tgl = $ex[2];
$bln = $ex[1];
$thn = $ex[0];
?>
                    <select class="form-control" name="tgl" id="tgl" required>
                        <option value="">Tanggal</option>
                        <?php for ($d = 1; $d <= 31; $d++) { ?>
                            <option value="<?php echo $d; ?>" <?php echo ($tgl == $d ? "selected=\"selected\"" : ""); ?>><?php echo $d; ?></option>
                        <?php }?>
                    </select>
                    <select class="form-control" name="bln" id="bln" required>
                        <option value="">Bulan</option>
                        <?php for ($d = 1; $d <= 12; $d++) { ?>
                            <option value="<?php echo $d; ?>" <?php echo ($bln == $d ? "selected=\"selected\"" : ""); ?>><?php echo $d; ?></option>
                        <?php }?>
                    </select>
                    <select class="form-control" name="thn" id="thn" required>
                        <option value="">Tahun</option>
                        <?php for ($d = 1957; $d <= 2017; $d++) {?>
                        <option value="<?php echo $d; ?>" <?php echo ($thn == $d ? "selected=\"selected\"" : ""); ?>><?php echo $d; ?></option>
                        <?php }?>
                    </select>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="NIK">Tempat Lahir</label>
                <div class="controls">
                    <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" value="<?php echo rc4($key, urldecode($rw->tmp_lahir)); ?>" required>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label>Jenis Kelamin</label>

                <div class="custom-control custom-radio">
                    <input id="jenkel" name="jenkel" type="radio" value="L" <?php echo (rc4($key, urldecode($rw->jenkel)) == "L" ? "checked=\"checked\"" : ""); ?>>
                    <label class="control-label" for="jenkel">Laki - Laki</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="jenkel" name="jenkel" type="radio" value="P" <?php echo (rc4($key, urldecode($rw->jenkel)) == "P" ? "checked=\"checked\"" : ""); ?>>
                    <label class="control-label" for="jenkel">Perempuan</label>
                </div>
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="no_hp">No. HP</label>
                <div class="controls">
                    <input type="text" class="form-control" id="no_hp" value="<?php echo rc4($key, urldecode($rw->no_hp)); ?>" required>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="alamat">Alamat</label>
                <div class="controls">
                    <textarea class="form-control" id="alamat" required><?php echo rc4($key, urldecode($rw->alamat)); ?></textarea>
                </div> <!-- /controls -->
            </div> <!-- /form-group -->

            <div class="form-group">
                <label class="control-label" for="status">Status Dalam Keluarga</label>
                <div class="controls">
                    <input type="text" class="form-control" id="status" value="<?php echo rc4($key, urldecode($rw->status_keluarga)); ?>">
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