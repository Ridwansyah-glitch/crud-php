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
    document.location.href='crud-modal.php';
    </script>";
    exit;
}
$title = "Halaman Mahasiswa";
include "layout/header.php";
$sql="SELECT * FROM mahasiswa ORDER BY id DESC";
$data_mahasiswa=query($sql);
?>
<div class="container mt-5">
    <h1>Data Mahasiswa</h1>
    <a href="tambah-mahasiswa" class="btn btn-primary mb-1"><i class="fas fa-solid fa-plus"></i> Tambah</a>
    <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"><i class="fas fa-solid fa-file-excel"></i>
        Download</a>
    <table class="table table-striped" id="table">
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
                    <a href="detail-mahasiswa.php?id=<?=$data['id']?>" class="btn btn-success btn-sm" title="Detail"><i
                            class="fas fa-info"></i></a>
                    <a href="ubah-mahasiswa.php?id=<?=$data['id']?>" class="btn btn-warning btn-sm" title="Edit"><i
                            class="fas fa-edit"></i></a></a>
                    <a href="hapus-mahasiswa.php?id=<?=$data['id']?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin data dihapus?')" title="Hapus"><i
                            class=" fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include "layout/footer.php" ?>
