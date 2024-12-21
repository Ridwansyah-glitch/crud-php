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
if ($_SESSION['level'] != 1 and $_SESSION['level'] != 2){
    echo "<script>
    alert('Anda tidak punya hak akses');
    document.location.href='akun.php';
    </script>";
    exit;
}


$title = "Data Barang";
include "layout/header.php";

$sql="SELECT * FROM barang";
$data_barang=query($sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $main_url;?>index">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- Data tables -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="tambah-barang" class="btn btn-primary mb-2"><i class="fas fa-solid fa-plus"></i>
                                Tambah</a>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Barcode</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; ?>
                                    <?php  foreach ($data_barang as $data): ?>
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td><?=$data['nama_barang'];?></td>
                                        <td><?=$data['jumlah'];?></td>
                                        <td>Rp <?=number_format($data['harga']);?></td>
                                        <td class="text-center">
                                            <img src="barcode.php?codetype=Code128&size=20&text=<?= $data['barcode'];?>&print=true"
                                                alt="Barcode">
                                        </td>
                                        <td><?=date('d/m/Y H:i:s',strtotime($data['tanggal']));?></td>
                                        <td>
                                            <a href="ubah-data-barang.php?id=<?=$data['id']?>"
                                                class="btn btn-success btn-sm" title="Edit"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="hapus-barang.php?id=<?=$data['id']?>" class="btn btn-danger btn-sm"
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
