<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Ubah Data Mahasiswa</h3>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Data Mahasiswa</li>
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
                            <h3 class="card-title">Ubah Data Mahasiswa</h3>
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
                            <div class="col-lg-6">
                                <form method="post" action="">
                                    <p>Detail Mahasiswa</p>
                                    <?php $id = $_GET['id'];
                                    require_once("../config.php");
                                    if ($_POST['simpan']) {
                                        $nim = $_POST['nim'];
                                        $nama = $_POST['nama'];
                                        $jk = $_POST['jk'];
                                        $prodi = $_POST['prodi'];
                                        $angkatan = $_POST['angkatan'];
                                        $alamat = $_POST['alamat'];

                                        $sql = "UPDATE mhs SET nim='$nim', nama='$nama', gender='$jk', prodi='$prodi', alamat='$alamat', angkatan ='$angkatan' WHERE id = $id";
                                        $hasil = $db->query($sql);
                                        if ($hasil) {
                                            echo "<script>alert('✔️ Data berhasil di ubah');
                                        window.location.href='./?p=mahasiswa';</script>";
                                        } else {
                                            echo "<script>alert('❌ Data tidak berhasil di ubah. Silahkan coba lagi!');
                                        window.location.href='./?p=mahasiswa';</script>";
                                        }
                                    }

                                    $sql = "SELECT * FROM mhs WHERE id = $id";
                                    $data = $db->query($sql);

                                    foreach ($data as $d) {
                                        switch ($d['prodi']) {
                                            case '1':
                                                $prodi = 'Informatika';
                                                $inf = "selected";
                                                break;
                                            case '2':
                                                $prodi = 'Arsitektur';
                                                $ars = "selected";
                                                break;
                                            case '3':
                                                $prodi = 'Ilmu Lingkungan';
                                                $ilk = "selected";
                                                break;
                                            case '4':
                                                $prodi = 'Perpustakaan Sains Informasi';
                                                $psi = "selected";
                                                break;
                                            default:
                                                $prodi = 'Tidak Diketahui';
                                                break;
                                        }

                                        switch ($d['jenis_kelamin']) {
                                            case 'L':
                                                $jk = 'Laki-Laki';
                                                $lk = "checked";
                                                break;
                                            case 'P':
                                                $jk = 'Perempuan';
                                                $pr = "checked";
                                                break;
                                        }

                                        echo " <table>
                                    <tr>
                                        <td>NIM</td>
                                        <td><input type='number' name='nim' class='form-control' value='$d[nim]'></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td><input type='text' name='nama' class='form-control' value='$d[nama]'></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <input type='radio' name='jk' value='L' id='jkL' $lk>
                                            <label for='jkL'>Laki-laki</label>
                                            <input type='radio' name='jk' value='P' id='jkP' $pr>
                                            <label for='jkP'>Perempuan</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Program Studi</td>
                                        <td><select name='prodi' class='form-control'>
                                                <option value='1' $inf>Informatika</option>
                                                <option value='2' $ars>Arsitektur</option>
                                                <option value='3' $ilk>Ilmu Lingkungan</option>
                                                <option value='4' $psi>Perpustakaan Sains Informasi</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Angkatan</td>
                                        <td><input type='number' name='angkatan' class='form-control' value='$d[angkatan]'></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><textarea name='alamat' class='form-control' id=''>$d[alamat]</textarea></td>
                                    </tr>
                                    <tr>
                                        <td><a href='./?p=mahasiswa' class='btn btn-danger'>Kembali</a> <input type='submit' name='simpan' value='Simpan Perubahan' class='btn btn-primary'></td>
                                    </tr>
                                </table>";
                                    }
                                    ?>
                                </form>
                            </div>
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