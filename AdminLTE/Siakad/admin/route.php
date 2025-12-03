<?php
    $p = $_GET['p'];

    switch ($p){
        case 'dosen': 
            require_once "dosen.php";
            break;

        case 'pegawai': 
            require_once "pegawai.php";
            break;

        case 'mahasiswa': 
            require_once "mahasiswa.php";
            break;

        case 'detail': 
            require_once "detail-mhs.php";
            break;

        case 'edit': 
            require_once "edit-mhs.php";
            break;

        case 'hapus': 
            require_once "hapus-mhs.php";
            break;

        case 'ganti_pw': 
            require_once "ganti_pw.php";
            break;

        case 'tambah': 
            require_once "tambah.php";
            break;
        
        default:
            require_once "dashboard.php";
            break;
    }
?>