<?php
$this->file('cr4');
$key = "1234567";
$simpanan = $this->model('simpanan');
$data = $simpanan->getData((object)get_defined_vars());
$data = $data->DataRow;
?>
<div class="d-flex justify-content-between">
    <a class="button btn btn-primary btn-large align-self-center <?php $hak_akses == 2 ? 'disabled invisible' : '';?>" href="/koperasi/tambah/simpanan">Tambah Simpanan</a>
    <div class="d-flex h1">Daftar Simpanan</div>
    <a class="button btn btn-primary btn-large align-self-center disabled invisible" href="/koperasi/tambah/simpanan">Tambah Anggota</a>
</div>

<br /><br />
<table class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th class="text-center align-middle">Kode Simpanan</th>
            <th class="text-center align-middle">Kode Anggota</th>
            <th class="text-center align-middle">Nama Anggota</th>
            <th class="text-center align-middle">Tanggal Simpanan</th>
            <th class="text-center align-middle">Besar Simpanan</th>
            <th class="text-center align-middle">Jenis Simpanan</th>
            <th class="text-center align-middle">Tanggal Transaksi</th>
            <th class="text-center align-middle">Total Transaksi</th>
            <?php if ($hak_akses == 1) {?>
                <th class="text-center align-middle">Action</td>
            <?php }?>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $k => $rw) {?>
        <tr>
            <th scope="row"><?php echo rc4($key, urldecode($rw->kd_simpanan)); ?></th>
            <td><?php echo rc4($key, urldecode($rw->kd_anggota)); ?></td>
            <td><?php echo rc4($key, urldecode($rw->nama_anggota)); ?></td>
            <td><?php echo rc4($key, urldecode($rw->tgl_simpanan)); ?></td>
            <td><?php echo rc4($key, urldecode($rw->total_simpanan)); ?></td>
            <td><?php echo $rw->nama_js; ?></td>
            <td><?php echo rc4($key, urldecode($rw->tgl_transaksi)); ?></td>
            <td><?php echo rc4($key, urldecode($rw->total_transaksi)); ?></td>
            <?php if ($hak_akses == 1) {?>
                <td class="d-flex h-100">
                <form class="d-inline-flex" action="/koperasi/simpanan/<?php echo rc4($key, urldecode($rw->kd_simpanan)); ?>" method="get">
                        <button class="btn btn-primary btn-sm"><i class="icon-edit"></i></button>
                </form>
<!--                    <a class="btn btn-primary btn-sm d-inline-flex" href="/koperasi/anggota/<?php echo rc4($key, urldecode($rw->kd_anggota)); ?>"><i class="icon-edit icon-align-center"></i></a> -->
                &nbsp;
                <form class="d-inline-flex" action="/koperasi/tambah/simpanan?action=delete" method="post">
                        <input type="text" class="form-control" name="kd_simpanan" id="kd_simpanan" value="<?php echo rc4($key, urldecode($rw->kd_simpanan)); ?>" hidden>
                        <button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
                </form>
<!--                    <a class="btn btn-danger btn-sm d-inline-flex" href="/koperasi/anggota/<?php echo rc4($key, urldecode($rw->kd_anggota)); ?>/delete">Delete</a> -->
                <!-- </div> -->
                </td>
            <?php }?>
        </tr>
        <?php }?>
    </tbody>
</table>