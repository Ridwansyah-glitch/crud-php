<?php
session_start();
$title = "Edit Mahasiswa";
include "layout/header.php";

$id = $_GET['id'];
$mahasiswa =query("SELECT * FROM mahasiswa WHERE id =$id")[0];
//check apakah tombol simpan ditekan
if (isset($_POST['simpan'])) {
if (update_mahasiswa($_POST)> 0) {
    echo "<script>
    alert('Data mahasiswa berhasil disimpan');
    document.location.href='mahasiswa.php';
    </script>";

}else {
    echo "<script> alert('Data mahasiswa gagal disimpan');
     document.location.href='mahasiswa.php';
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
                    <h1 class="m-0">Edit Data Mahasiswa</h1>
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
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $mahasiswa['id'];?>">
                                <input type="hidden" name="fotoLama" value="<?= $mahasiswa['foto'];?>">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                        value="<?=$mahasiswa['nama'];?>">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="prodi" class="form-label">Prodi</label>
                                        <select class="form-control" name="prodi">
                                            <?php $prodi = $mahasiswa['prodi'];?>
                                            <option value="Teknik Informatika"
                                                <?=$prodi == 'Teknik Informatika' ? 'selected' :null?>>
                                                Teknik Informatika</option>
                                            <option value="Teknik Industri"
                                                <?=$prodi == 'Teknik Industri' ? 'selected' :null?>>Teknik
                                                Industri</option>
                                            <option value="Teknik Mesin"
                                                <?=$prodi == 'Teknik Mesin' ? 'selected' :null?>>Teknik
                                                Mesin</option>
                                            <option value="Teknik Sipil"
                                                <?=$prodi == 'Teknik Sipil' ? 'selected' :null?>>Teknik
                                                Sipil</option>
                                            <option value="Ilmu Komunikasi"
                                                <?=$prodi == 'Teknik Komunikasi' ? 'selected' :null?>>Ilmu
                                                Komunikasi</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="jk" class="form-label">Jenis Kelamin</label>
                                        <select class="form-control" name="jk">
                                            <?php $jk = $mahasiswa['jk']; ?>
                                            <option value="laki-laki" <?= $jk == 'laki-laki'? 'selected' : null?>>Laki -
                                                laki</option>
                                            <option value="perempuan" <?= $jk == 'perempuan'? 'selected' : null?>>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">telepon</label>
                                    <input type="number" class="form-control" id="telepon" name="telepon"
                                        placeholder="Telepon" value="<?=$mahasiswa['telepon'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Alamat" value="<?=$mahasiswa['alamat'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email"
                                        value="<?=$mahasiswa['email'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="foto"
                                        onchange="previewImg()">
                                    <p class="mb-2">
                                        <small>Gambar sebelumnya</small>
                                    </p>
                                    <img src="images/<?=$mahasiswa['foto']?>" class="img-thumbnail img-preview"
                                        alt="foto" width="100px">
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
