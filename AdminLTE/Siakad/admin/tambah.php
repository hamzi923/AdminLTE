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
                            <h3 class="card-title">Tambah Mahasiswa</h3>
                            <!--end::Card Title-->
                            <!--begin::Card Toolbar-->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                </button>
                            </div>
                            <!--end::Card Toolbar-->
                        </div>
                        <!--end::Card Header-->
                        <div class="card-body">
                            <?php
                            if ($_POST['simpan']) {
                                $nim = $_POST['nim'];
                                $nama = $_POST['nama'];
                                $jk = $_POST['jk'];
                                $alamat = $_POST['alamat'];
                                $prodi = $_POST['prodi'];
                                $angkatan = $_POST['angkatan'];

                                require_once("../config.php");
                                $waktu = date("Y-m-d H:i:s");
                                $sql = "INSERT INTO mhs SET nim='$nim', nama='$nama', gender='$jk', alamat='$alamat',prodi='$prodi' , angkatan='$angkatan',waktu='$waktu'";
                                $tes = $db->query($sql);
                                if ($tes) {
                                    echo "<div class='alert alert-success'>Data Berhasil Disimpan. <br>
        <a href='./?p=mahasiswa'>Lihat Data</a></div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Data Gagal Disimpan. <br>
        <a href='./?p=mahasiswa'>Lihat Data</a></div>";
                                }
                            }
                            ?>
                            <form method="POST" action="">
                                <table>
                                    <tr>
                                        <td>NIM</td>
                                        <td><input type="number" name="nim" class="form-control" value="<?= $nim ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td><input type="text" name="nama" class="form-control" value="<?= $nama ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <input type="radio" name="jk" value="L" id="jkL">
                                            <label for="jkL"  value="<?= $jk ?>">Laki-laki</label>
                                            <input type="radio" name="jk" value="P" id="jkP">
                                            <label for="jkP"  value="<?= $jk ?>">Perempuan</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><textarea name="alamat" class="form-control" id="" value="<?= $alamat ?>" required></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Program Studi</td>
                                        <td><select name="prodi" class="form-control" value="<?= $prodi ?>" required>
                                                <option value="">Pilih Prodi</option>
                                                <option value="1">Informatika</option>
                                                <option value="2">Arsitektur</option>
                                                <option value="3">Ilmu Lingkungan</option>
                                                <option value="4">Perpustakaan Sains Informasi</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Angkatan</td>
                                        <td><input type="number" name="angkatan" class="form-control" value="<?= $angkatan?>" required></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="simpan" value="simpan" class="btn btn-primary"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <!--begin::Card Footer-->
                        <div class="card-footer">

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