<?php
$this->file('cr4');
$key = "1234567";
$anggota = $this->model('anggota');
$data = $anggota->getData((object) get_defined_vars());
$data = $data->DataRow;
?>
<div class="d-flex justify-content-between">
	<a class="button btn btn-primary btn-large align-self-center" href="/koperasi/tambah/anggota">Tambah Anggota</a>
	<div class="d-flex h1">Daftar Anggota</div>
	<a class="button btn btn-primary btn-large align-self-center disabled invisible" href="/koperasi/tambah/anggota">Tambah Anggota</a>
</div>

<br /><br />
<table class="table table-bordered table-striped table-sm">
	<thead>
		<tr>
			<th class="text-center align-middle">Kode Anggota</th>
			<th class="text-center align-middle">NIK</th>
			<th class="text-center align-middle">Nama Anggota</th>
			<th class="text-center align-middle">Tempat Lahir</th>
			<th class="text-center align-middle">Tanggal Lahir</th>
			<th class="text-center align-middle">Jenis Kelamin</th>
			<th class="text-center align-middle">Alamat</th>
			<th class="text-center align-middle">No. HP</th>
			<th class="text-center align-middle">Status Keluarga</th>
			<th class="text-center align-middle">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $k => $rw) { ?>
		<tr>
			<th scope="row"><?php echo rc4($key, urldecode($rw->kd_anggota)); ?></th>
			<td><?php echo rc4($key, urldecode($rw->NIK)); ?></td>
			<td><?php echo rc4($key, urldecode($rw->nama_anggota)); ?></td>
			<td><?php echo rc4($key, urldecode($rw->tmp_lahir)); ?></td>
			<td><?php echo date("d M Y", strtotime(rc4($key, urldecode($rw->tgl_lahir)))); ?></td>
			<td><?php echo rc4($key, urldecode($rw->jenkel)) == 'L' ? 'Laki - Laki' : 'Perempuan'; ?></td>
			<td><?php echo rc4($key, urldecode($rw->alamat)); ?></td>
			<td><?php echo rc4($key, urldecode($rw->no_hp)); ?></td>
			<td><?php echo rc4($key, urldecode($rw->status_keluarga)); ?></td>
			<td class="d-flex">
				<!-- <div class="d-block"> -->
				<form class="d-inline-flex" action="/koperasi/anggota/<?php echo rc4($key, urldecode($rw->kd_anggota)); ?>" method="get">
						<button class="btn btn-primary btn-sm"><i class="icon-edit"></i></button>
				</form>
<!-- 					<a class="btn btn-primary btn-sm d-inline-flex" href="/koperasi/anggota/<?php echo rc4($key, urldecode($rw->kd_anggota)); ?>"><i class="icon-edit icon-align-center"></i></a> -->
				&nbsp;
				<form class="d-inline-flex" action="/koperasi/tambah/anggota?action=delete" method="post">
						<input type="text" class="form-control" name="kd_anggota" id="kd_anggota" value="<?php echo rc4($key, urldecode($rw->kd_anggota)); ?>" hidden>
						<button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
				</form>
<!-- 					<a class="btn btn-danger btn-sm d-inline-flex" href="/koperasi/anggota/<?php echo rc4($key, urldecode($rw->kd_anggota)); ?>/delete">Delete</a> -->
				<!-- </div> -->
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>