<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Detail Mahasiswa</h3>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Mahasiswa</li>
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
                            <h3 class="card-title">Admin</h3>
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
                                <p>Detail Mahasiswa</p>
                                <?php $id = $_GET['id'];
                                require_once("../config.php");
                                $sql = "SELECT * FROM mhs WHERE id = $id";
                                $data = $db->query($sql);

                                foreach ($data as $d) {
                                    switch ($d['prodi']) {
                                        case '1':
                                            $prodi = 'Informatika';
                                            break;
                                        case '2':
                                            $prodi = 'Arsitektur';
                                            break;
                                        case '3':
                                            $prodi = 'Ilmu Lingkungan';
                                            break;
                                        case '4':
                                            $prodi = 'Perpustakaan Sains Informasi';
                                            break;
                                        default:
                                            $prodi = 'Tidak Diketahui';
                                            break;
                                    }

                                    switch ($d['gender']) {
                                        case 'L':
                                            $jk = 'Laki-Laki';
                                            break;
                                        case 'P':
                                            $jk = 'Perempuan';
                                            break;
                                    }

                                    echo "<table border='1' class='table table-hover table-striped'>
                            <tr><td>NIM</td><td>$d[nim]</td></tr>
                            <tr><td>Nama</td><td>$d[nama]</td></tr>
                            <tr><td>Gender</td><td>$jk</td></tr>
                            <tr><td>Prodi</td><td>$prodi</td></tr>
                            <tr><td>Angkatan</td><td>$d[angkatan]</td></tr>
                            <tr><td>Alamat</td><td>$d[alamat]</td></tr>
                            </table>";
                                }
                                ?>
                                <a href="./?p=mahasiswa" class="btn btn-primary">Kembali</a>
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