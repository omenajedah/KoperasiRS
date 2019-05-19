<?php

$DefaultFields = " a.*, b.tgl_transaksi, b.total_transaksi, c.kd_jp, c.nama_jp, c.nominal_pinjaman, d.nama_anggota ";
$Where = " WHERE 1 ";
$order = " Order By a.ID ";

if ($Fields) {
	$DefaultFields = $Fields;
}

if ($hak_akses == 2) {
	$Where .= " AND a.kd_anggota = '$kd_anggota' ";
}

if ($OrderBy) {
	$order = " ORDER BY {$OrderBy}";
}


if ($Mode == "Regular") {
    $SQL = "SELECT $DefaultFields FROM pinjaman a
	LEFT JOIN detail_pinjaman b ON a.kd_pinjaman = b.kd_pinjaman
	LEFT JOIN jenis_pinjaman c ON b.kd_jp = c.kd_jp
	LEFT JOIN anggota d ON a.kd_anggota = d.kd_anggota ";
} else {
	$SQL = "SELECT COUNT(*) as rowCount FROM pinjaman a
	LEFT JOIN detail_pinjaman b ON a.kd_pinjaman = b.kd_pinjaman
	LEFT JOIN jenis_pinjaman c ON b.kd_jp = c.kd_jp
	LEFT JOIN anggota d ON a.kd_anggota = d.kd_anggota ";
}



$SQL.=$Where.=$order;