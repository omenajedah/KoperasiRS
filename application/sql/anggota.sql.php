<?php

$DefaultFields = "*";
$Where = " WHERE 1 ";
$order = " ORDER BY a.ID ";

if ($Fields) {
	$DefaultFields = $Fields;
}

if ($Mode == "Regular") {
	$SQL = "SELECT $DefaultFields FROM anggota a
			LEFT JOIN `login` b ON a.kd_anggota = b.kd_anggota
			";

} else {
	$SQL = "SELECT COUNT(*) as rowCount FROM anggota a
			LEFT JOIN `login` b ON a.kd_anggota = b.kd_anggota
			";
}



$SQL.=$Where.=$order;

