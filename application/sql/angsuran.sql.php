<?php

$DefaultFields = "*";
$Where = " WHERE 1 ";
$order = " ORDER BY a.ID ";

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
	$SQL = "SELECT a.*, b.`nama_anggota` FROM angsuran a
        LEFT JOIN anggota b on a.`kd_anggota` = b.`kd_anggota`
        ";

} else {
	$SQL = "SELECT a.*, b.`nama_anggota` FROM angsuran a
        LEFT JOIN anggota b on a.`kd_anggota` = b.`kd_anggota`
		";
}



$SQL.=$Where.=$order;

