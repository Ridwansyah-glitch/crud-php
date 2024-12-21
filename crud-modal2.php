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

$title = "Daftar Barang";

include 'layout/header2.php';

//tampil seluruh data
$users = query("SELECT * FROM akun");

//tampil data berdasarkan user login
$id_akun = $_SESSION['id'];
$data_bylogin =query("SELECT * FROM akun WHERE id ='$id_akun'");


if (isset($_POST['simpan'])) {
    if (create_user($_POST)> 0) {
        echo "<script>
        alert('Data user berhasil disimpan');
        document.location.href='crud-modal.php';
        </script>";

    }else {
        echo "<script> alert('Data user gagal disimpan');
         document.location.href='crud-modal.php';
        </script>";

    }
}

if (isset($_POST['edit'])) {
    if (update_user($_POST)> 0) {
        echo "<script>
        alert('Data user berhasil disimpan');
        document.location.href='crud-modal.php';
        </script>";

    }else {
        echo "<script> alert('Data user gagal disimpan');
         document.location.href='crud-modal.php';
        </script>";

    }
}
?>

<div class="container mt-5">
    <h1>Data Akun</h1>
    <hr>
    <?php if ($_SESSION['level'] == 1) :?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fas fa-solid fa-plus"></i> Tambah
    </button>
    <?php endif; ?>
    <table class="table table-striped mt-3">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            <!-- tampil data keseluruhan -->
            <?php if($_SESSION['level'] == 1) : ?>
            <?php foreach ($users as $user) :?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$user['nama']?></td>
                <td><?=$user['username'];?></td>
                <td><?=$user['email']?></td>
                <td><?=$user['level'] == 1 ? 'Admin' : 'Operator' ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                        data-bs-target="#modalEdit<?=$user['id'];?>" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modalHapus<?=$user['id'];?>" title="Hapus">
                        <i class=" fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach;?>
            <?php else: ?>
            <!-- Tampil data berdasarkan user login -->
            <?php foreach ($data_bylogin as $user) :?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$user['nama']?></td>
                <td><?=$user['username'];?></td>
                <td><?=$user['email']?></td>
                <td><?=$user['level'] == 1 ? 'Admin' : 'Operator' ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                        data-bs-target="#modalEdit<?=$user['id'];?>" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach;?>
            <?php endif; ?>
        </tbody>
    </table>
</div>



<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password"
                            required minlength="6">
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select name="level" id="level" class="form-select">
                            <option value="">-- pilih level --</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator Barang</option>
                            <option value="3">Operator Mahasiswa</option>
                        </select>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="simpan" class="btn btn-primary">simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($users as $user) : ?>
<div class="modal fade" id="modalEdit<?=$user['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?=$user['id']?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama"
                            required value="<?=$user['nama'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            required value="<?=$user['username'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required
                            value="<?=$user['email'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <small>(Masukan password lama /
                                baru)</small></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password"
                            required minlength="6">
                    </div>

                    <?php if($_SESSION['level'] == 1): ?>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select name="level" id="level" class="form-select">
                            <?php $level = $user['level']; ?>
                            <option value="1" <?= $level == '1'? 'selected' : null?>>Admin</option>
                            <option value="2" <?= $level == '2'? 'selected' : null?>>Operator Barang</option>
                            <option value="3" <?= $level == '3'? 'selected' : null?>>Operator Mahasiswa</option>
                        </select>
                    </div>
                    <?php else: ?>
                    <input type="hidden" nama="level" value="<?=$user['level']?>">
                    <?php endif; ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="edit" class="btn btn-primary">simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>

<?php foreach ($users as $user) : ?>
<!-- Modal hapus -->
<div class="modal fade" id="modalHapus<?=$user['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghapus Data User : <?= $user['nama'];?> .?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="hapus-user.php?id=<?=$user['id'];?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php include 'layout/footer2.php';?>
