<?php

$DefaultFields = " a.*, b.tgl_transaksi, b.total_transaksi, c.kd_js, c.nama_js, c.nominal_simpanan, d.nama_anggota ";
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
    $SQL = "SELECT $DefaultFields FROM simpanan a
		LEFT JOIN detail_simpanan b ON a.kd_simpanan = b.kd_simpanan
		LEFT JOIN jenis_simpanan c ON b.kd_js = c.kd_js
		LEFT JOIN anggota d ON a.kd_anggota = d.kd_anggota ";
} else {
	$SQL = "SELECT COUNT(*) AS rowCount FROM simpanan a
	LEFT JOIN detail_simpanan b ON a.kd_simpanan = b.kd_simpanan
	LEFT JOIN jenis_simpanan c ON b.kd_js = c.kd_js
	LEFT JOIN anggota d ON a.kd_anggota = d.kd_anggota 
  ";
}



$SQL.=$Where.=$order;