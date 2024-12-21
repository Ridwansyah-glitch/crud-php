<?php
session_start();
//membatasi akses
if (!isset($_SESSION['login'])) {
    echo "<script>
    alert('Harus login terlebih dahulu');
    document.location.href='login.php';
    </script>";
    exit;
}
//membatasi halaman sesuai user login
if ($_SESSION['level'] != 1 and $_SESSION['level'] != 3){
    echo "<script>
    alert('Anda tidak punya hak akses');
    document.location.href='akun.php';
    </script>";
    exit;
}
$title = "Halaman Mahasiswa";
include "layout/header.php";
$sql="SELECT * FROM mahasiswa ORDER BY id DESC";
$data_mahasiswa=query($sql);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Mahasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $main_url;?>index">Home</a></li>
                        <li class="breadcrumb-item active">Data Mahasiswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- Data tables -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="tambah-mahasiswa" class="btn btn-primary mb-2"><i class="fas fa-solid fa-plus"></i>
                                Tambah</a>
                            <a href="download-excel-mahasiswa.php" class="btn btn-success mb-2"><i
                                    class="fas fa-solid fa-file-excel"></i>
                                Download</a>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; ?>
                                    <?php  foreach ($data_mahasiswa as $data): ?>
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td><?=$data['nama'];?></td>
                                        <td><?=$data['prodi'];?></td>
                                        <td><?=$data['jk'];?></td>
                                        <td><?=$data['telepon'];?></td>
                                        <td><?=$data['alamat'];?></td>
                                        <td><?=$data['email'];?></td>
                                        <td>
                                            <a href="detail-mahasiswa.php?id=<?=$data['id']?>"
                                                class="btn btn-success btn-sm" title="Detail"><i
                                                    class="fas fa-info"></i></a>
                                            <a href="ubah-mahasiswa.php?id=<?=$data['id']?>"
                                                class="btn btn-warning btn-sm" title="Edit"><i
                                                    class="fas fa-edit"></i></a></a>
                                            <a href="hapus-mahasiswa.php?id=<?=$data['id']?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin data dihapus?')" title="Hapus"><i
                                                    class=" fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./Data Table -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer -->
<?php
            include "layout/footer.php";
?>
<!-- end footer -->
