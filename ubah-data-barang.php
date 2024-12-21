<?php
session_start();
$title = "Ubah Barang";
include "layout/header.php";
//id barang dari url
$id=(int)$_GET['id'];

$barang= query("SELECT * FROM barang WHERE id=$id")[0];

//check apakah tombol simpan ditekan
if (isset($_POST['simpan'])) {
if (update_barang($_POST)> 0) {
    echo "<script>
    alert('barang berhasil diubah');
    document.location.href='index.php';
    </script>";

}else {
    echo "<script> alert('barang gagal diubah');
     document.location.href='index.php';
    </script>";

}
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Barang</h1>
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
                <!-- Data tables -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" name="id" placeholder="Nama Barang"
                                        value="<?=$barang['id'];?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                        placeholder="Nama Barang" value="<?=$barang['nama_barang'];?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah"
                                        placeholder="Jumlah Barang" value="<?=$barang['jumlah'];?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga"
                                        placeholder="Harga Barang" value="<?=$barang['harga'];?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="simpan">simpan</button>
                            </form>
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
