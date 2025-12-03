<?php
$id = $_GET['id'];

require_once("../config.php");
$sql = "DELETE FROM mhs WHERE id = $id";
$hasil = $db->query($sql);

if ($hasil) {
    echo "<script>alert('Data Berhasil di hapus💔');  
    window.location.href='./?p=mahasiswa';</script>";
} else {
    echo "<script>alert('Data Gagal di hapus!');
    window.location.href='./?p=mahasiswa';</script>";
}