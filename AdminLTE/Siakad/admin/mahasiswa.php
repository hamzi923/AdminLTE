<?php
require_once("../config.php");

$keyword = $_POST['keyword'];
$category = $_POST['category'];
$sql = "SELECT * FROM mhs";

if ($_POST['tombolCari']) {
    if (!empty($keyword) and !empty($category)) {
        if ($category == "prodi") {
            if ($keyword == "INF") {
                $prodi = 1;
            } elseif ($keyword == "ARS") {
                $prodi = 2;
            } elseif ($keyword == "ILK") {
                $prodi = 3;
            }
            $sql = "SELECT * FROM mhs WHERE $category LIKE '%$prodi%'";
        } else {
            $sql = "SELECT * FROM mhs WHERE $category LIKE '%$keyword%'";
        }
    }

    $jumlahData = $data->num_rows;
    if ($jumlahData > 0) {
    }
}

$data = $db->query($sql);

?>
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard Admin</h3>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard Admin</li>
                    </ol>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-12">
                    <!--begin::Card-->
                    <div class="card mt-4">
                        <!--begin::Card Header-->
                        <div class="card-header">
                            <!--begin::Card Title-->
                            <h3 class="card-title">Data Mahasiswa</h3>
                            <!--end::Card Title-->
                            <!--begin::Card Toolbar-->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-tool"
                                    data-lte-toggle="card-remove"
                                    title="Remove">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <!--end::Card Toolbar-->
                        </div>
                        <!--end::Card Header-->

                        <div class="card-body">
                            <!-- Di sinilah kamu tambahkan konten -->
                            <p>The following is the data on all students of UIN Prof K. H Saiffudin Zuhri:</p>
                            <form method="post" action="#">
                                <div class="row g-2 align-items-center">
                                    <div class="col-12 col-md-3">
                                        <a href="./?p=tambah" class="btn btn-primary w-100">Add student</a>
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <input type="text" name="keyword" class="form-control" placeholder="Masukkan Kata Kunci..."
                                            value="<?= $keyword ?>">
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <select name="category" class="form-select">
                                            <option value="nim" <?php if ($category == "nim") echo "selected"; ?>>NIM</option>
                                            <option value="nama" <?php if ($category == "nama") echo "selected"; ?>>Name</option>
                                            <option value="gender" <?php if ($category == "gender") echo "selected"; ?>>gender</option>
                                            <option value="angkatan" <?php if ($category == "angkatan") echo "selected"; ?>>force</option>
                                            <option value="prodi" <?php if ($category == "prodi") echo "selected"; ?>>Prodi</option>
                                        </select>
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <input type="submit" class="btn btn-primary w-100" value="Cari" name="tombolCari">
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <?php
                                if ($_POST['tombolCari']) {
                                    if (!empty($keyword) and !empty($category)) {
                                        $jumlahData = $data->num_rows;
                                        if ($jumlahData > 0) {
                                            echo "<p><i>Telah di temukan $jumlahData Data dari kata kunci $keyword</i></p>";
                                        } else {
                                            echo "<p><i>Tidak ada Data di temukan dari kata kunci $keyword</i></p>";
                                        }
                                    }
                                }
                                ?>

                                <table class="table table-striped table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Name</th>
                                            <th>gender</th>
                                            <th>Prodi</th>
                                            <th>Angkatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($data as $d) {
                                            $nomor++;
                                            if ($d['prodi'] == 1) {
                                                $prodi = "Informatika";
                                            } elseif ($d['prodi'] == 2) {
                                                $prodi = "Arsitektur";
                                            } elseif ($d['prodi'] == 3) {
                                                $prodi = "Ilmu Lingkungan";
                                            } elseif ($d['prodi'] == 4) {
                                                $prodi = "Perpustakaan Sains Informasi";
                                            } else {
                                                $prodi = "Tidak Ditemukan";
                                            }
                                            if ($d['gender'] == 'L') {
                                                $jk = "Laki-laki";
                                            } else {
                                                $jk = "Perempuan";
                                            }
                                            echo "<tr>
                                        <th>$nomor</th>
                                        <th>$d[nim]</th>
                                        <th>$d[nama]</th>
                                        <th>$jk</th>
                                        <th>$prodi</th>
                                        <th>$d[angkatan]</th>
                                        <th>
                                        <a href='./?p=detail&id=$d[id]'class='btn btn-xs btn-info'>Detail</a>
                                        <a href='./?p=edit&id=$d[id]' class='btn btn-xs btn-warning m-1'>Edit</a>
                                        <a href='./?p=hapus&id=$d[id]'class='btn btn-xs btn-danger' 
                                        onclick=\"return confirm('Apakah kamu yakin data akan dihapus?')\">Hapus</a>
                                        </th>

                                    </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small>This Data is valid!</small>
                        </div>
                        <!--end::Card Footer-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>