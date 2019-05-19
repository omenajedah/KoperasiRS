<?php
$this->file('cr4');
$key = "1234567";
$angsuran = $this->model('angsuran');
$data = $angsuran->getData((object) get_defined_vars());
$data = $data->DataRow;
?>
<div class="d-flex justify-content-between">
	<a class="button btn btn-primary btn-large align-self-center <?php $hak_akses == 2 ? 'disabled invisible' : '';?>" href="/koperasi/tambah/angsuran">Tambah Angsuran</a>
	<div class="d-flex h1">Daftar Angsuran</div>
	<a class="button btn btn-primary btn-large align-self-center disabled invisible" href="/koperasi/tambah/angsuran">Tambah Angsuran</a>
</div>

<br /><br />
<table class="table table-bordered table-striped table-sm">
	<thead>
		<tr>
			<th class="text-center align-middle">Kode Angsuran</th>
			<th class="text-center align-middle">Nama Anggota</th>
			<th class="text-center align-middle">Tanggal Angsuran</th>
			<th class="text-center align-middle">Jatuh Tempo</th>
			<th class="text-center align-middle">Angsuran Ke</th>
			<th class="text-center align-middle">Total Angsuran</th>
			<?php if ($hak_akses == 1) {?>
			<th class="text-center align-middle">Action</th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $k => $rw) {?>
		<tr>
			<th scope="row"><?php echo rc4($key, urldecode($rw->kd_angsuran)); ?></th>
			<td><?php echo rc4($key, urldecode($rw->nama_anggota)); ?></td>
			<td><?php echo rc4($key, urldecode($rw->tgl_angsuran)); ?></td>
			<td><?php echo rc4($key, urldecode($rw->jatuh_tempo)); ?></td>
			<td><?php echo rc4($key, urldecode($rw->tahap_angsuran)); ?></td>
			<td><?php echo rc4($key, urldecode($rw->total_angsuran)); ?></td>
			<?php if ($hak_akses == 1) {?>
				<td class="d-flex">
					<!-- <div class="d-block"> -->
					<form class="d-inline-flex" action="/koperasi/angsuran/<?php echo rc4($key, urldecode($rw->kd_angsuran)); ?>" method="get">
							<button class="btn btn-primary btn-sm"><i class="icon-edit"></i></button>
					</form>
<!-- 					<a class="btn btn-primary btn-sm d-inline-flex" href="/koperasi/anggota/<?php echo rc4($key, urldecode($rw->kd_anggota)); ?>"><i class="icon-edit icon-align-center"></i></a> -->
					&nbsp;
					<form class="d-inline-flex" action="/koperasi/tambah/angsuran?action=delete" method="post">
							<input type="text" class="form-control" name="kd_angsuran" id="kd_angsuran" value="<?php echo rc4($key, urldecode($rw->kd_angsuran)); ?>" hidden>
							<button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
					</form>
<!-- 					<a class="btn btn-danger btn-sm d-inline-flex" href="/koperasi/anggota/<?php echo rc4($key, urldecode($rw->kd_anggota)); ?>/delete">Delete</a> -->
					<!-- </div> -->
				</td>
			<?php }?>
		</tr>
	<?php }?>
	</tbody>
</table>