<?php
session_start();
$title ='Detail Mahasiswa';
include "layout/header.php";


//mendapatkan id di url
$id=(int) $_GET['id'];


$mahasiswa =query("SELECT * FROM mahasiswa WHERE id = $id")[0];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data <?= $mahasiswa['nama'];?></h1>
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
                            <a href="javascript:history.back(-1);" class="btn btn-primary btn-sm"><i
                                    class="fas fa-solid fa-arrow-left"></i>
                                Kembali</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <td>Nama</td>
                                    <td><?=$mahasiswa["nama"];?></td>
                                </tr>
                                <tr>
                                    <td>Program Studi</td>
                                    <td><?=$mahasiswa["prodi"];?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td><?=$mahasiswa["jk"];?></td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td><?=$mahasiswa["telepon"];?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?=$mahasiswa["email"];?></td>
                                </tr>
                                <tr>
                                    <td>Foto</td>
                                    <td>
                                        <img src="<?= $main_url?>images/<?=$mahasiswa['foto'];?>" alt="">
                                    </td>
                                </tr>

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
