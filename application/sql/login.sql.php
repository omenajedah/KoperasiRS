<?php

$DefaultFields = "*";
$Where = " WHERE 1 ";
$order = " Order By nama_anggota ;";

if ($Fields) {
	$DefaultFields = $Fields;
}



if ($username) {
	$Where .= " AND `username` = '$username' ";
}

if ($password) {
	$Where .= " AND `password` = '$password' ";
}

if ($hak_akses) {
	$Where .= " AND hak_akses = '$hak_akses' ";
}

if ($query) {
	$Where .= " AND `username` LIKE '%{$query}%' OR `password` LIKE '%{$query}%' ";
}

if ($OrderBy) {
	$order = " ORDER BY {$OrderBy};";
}


if ($Mode == "Regular") {
	$SQL = "SELECT $DefaultFields FROM `login` ";

} else {
	$SQL = "SELECT Count(*) AS rowCount FROM `login` ";
}



$SQL.=$Where.=$order;