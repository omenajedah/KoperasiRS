<?php

if (!$isLogin && $menu != 'home' && $menu != 'login') {
    $menu = 'home';
}

switch ($menu) {
case 'login':
    include_once 'login.php';
    break;
case 'anggota':
    if ($sub_menu == 'tambah') {
        include_once 'tambah_anggota.php';
    } else if ($sub_menu == 'edit') {
        include_once 'edit_anggota.php';
    } else {
        include_once 'anggota.php';
    }
    break;
case 'simpanan':
    if ($sub_menu == 'tambah') {
        include_once 'tambah_simpanan.php';
    } else if ($sub_menu == 'edit') {
        include_once 'edit_simpanan.php';
    } else {
        include_once 'simpanan.php';
    }
    break;
case 'pinjaman':
    if ($sub_menu == 'tambah') {
        include_once 'tambah_pinjaman.php';
    } else if ($sub_menu == 'edit') {
        include_once 'edit_pinjaman.php';
    } else {
        include_once 'pinjaman.php';
    }
    break;
case 'angsuran':
    if ($sub_menu == 'tambah') {
        include_once 'tambah_angsuran.php';
    } else if ($sub_menu == 'edit') {
        include_once 'edit_angsuran.php';
    } else {
        include_once 'angsuran.php';
    }
    break;
case 'kwitansi':
    include_once 'kwitansi.php';
    break;
case 'help':
    include_once 'help.php';
    break;

default:
    include_once 'about.php';
}