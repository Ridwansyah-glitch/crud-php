<?php
//url induk
$main_url = "http://localhost:88/CRUD-PHP/";

require_once("database.php");


function query($query) {
    global $conn;

    $result     = mysqli_query($conn, $query);
    $rows       =[];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//tambah barang
function create_barang($data) {
    global $conn;
    $nama_barang    =strip_tags($data['nama_barang']);
    $jumlah         =strip_tags($data['jumlah']);
    $harga          =strip_tags($data['harga']);
    $barcode        =rand(100000,999999);

    $query          = "INSERT INTO barang VALUES (null,'$nama_barang','$jumlah','$harga','$barcode',CURRENT_TIMESTAMP())";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function update_barang($data){
    global $conn;
    $id             =$data['id'];
    $nama_barang    =strip_tags($data['nama_barang']);
    $jumlah         =strip_tags($data['jumlah']);
    $harga          =strip_tags($data['harga']);

    $query          = "UPDATE barang SET nama_barang='$nama_barang',jumlah='$jumlah',harga='$harga',tanggal=CURRENT_TIMESTAMP() WHERE id='$id'";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function hapus_barang($id){
    global $conn;

    $query= "DELETE FROM barang WHERE id=$id";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}


function create_mahasiswa($data){
    global $conn;

    $nama       = strip_tags($data['nama']);
    $prodi      = strip_tags($data['prodi']);
    $jk         = strip_tags($data['jk']);
    $telepon    = strip_tags($data['telepon']);
    $alamat     = strip_tags($data['alamat']);
    $email      = strip_tags($data['email']);
    $foto       = upload_file();

    //cek upload foto
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES (null,'$nama','$prodi','$jk','$telepon','$alamat','$email','$foto')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function update_mahasiswa($data){
    global $conn;
    $id         = $data['id'];
    $nama       = strip_tags($data['nama']);
    $prodi      = strip_tags($data['prodi']);
    $jk         = strip_tags($data['jk']);
    $telepon    = strip_tags($data['telepon']);
    $alamat     = strip_tags($data['alamat']);
    $email      = strip_tags($data['email']);
    $fotoLama   = strip_tags($data['fotoLama']) ;

       //cek upload foto baru tidak
       if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    }else {
        $foto = upload_file();
    }
    $query = "UPDATE mahasiswa SET nama='$nama',prodi = '$prodi',jk='$jk',telepon ='$telepon',alamat='$alamat',email ='$email',foto ='$foto' WHERE id= '$id'";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


function upload_file(){

$namaFile       = $_FILES['foto']['name'];
$ukuranFile     = $_FILES['foto']['size'];
$error          = $_FILES['foto']['error'];
$tmpName        = $_FILES['foto']['tmp_name'];


//cek file yang diupload
$extensionFileValid =['jpg','jpeg','png'];
$extensiFile        =explode('.',$namaFile);

$extensiFile        = strtolower(end($extensiFile));

if (!in_array($extensiFile,$extensionFileValid)) {

    //pesan gagal
    echo "
        <script>
            alert('Format file tidak valid');
            document.location.href = 'tambah-mahasiswa.php';
        </script>";

    die();
}

if ($ukuranFile > 1048000) {
    echo "
    <script>
        alert('Format file lebih dari 2MB');
        document.location.href = 'tambah-mahasiswa.php';
    </script>";
    die();
}

//generate nama file baru
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .=$extensiFile;

//pindahkan ke folder lokal
move_uploaded_file($tmpName,'images/'.$namaFileBaru);
return $namaFileBaru;

}


function delete_mahasiswa($id){
    global $conn;

    //ambil foto sesuai dengan data yang dipilih
    $foto =query("SELECT * FROM mahasiswa WHERE id= $id")[0];

    unlink("images/".$foto['foto']);

    $query = "DELETE FROM mahasiswa WHERE id=$id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


function create_user($data) {
    global $conn;
    $nama       = strip_tags($data['nama']);
    $username   = strip_tags($data['username']);
    $email      = strip_tags($data['email']);
    $password   = strip_tags($data['password']);
    $level      = strip_tags($data['level']);

    //enkripsi
    $password = password_hash($password,PASSWORD_DEFAULT);

   $query= "INSERT INTO akun VALUES (null,'$nama','$username','$email','$password','$level')";

    mysqli_query($conn,$query);

   return mysqli_affected_rows($conn);
}

function update_user($data){
    global $conn;

    $id         = strip_tags($data['id']);
    $nama       = strip_tags($data['nama']);
    $username   = strip_tags($data['username']);
    $email      = strip_tags($data['email']);
    $password   = strip_tags($data['password']);
    $level      = strip_tags($data['level']);

    $password = password_hash($password,PASSWORD_DEFAULT);

    $query = "UPDATE akun SET nama = '$nama', username = '$username',email='$email',password = '$password',level = '$level' WHERE id=$id";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function delete_user($id){
    global $conn;

    $query = "DELETE FROM akun WHERE id =$id";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}