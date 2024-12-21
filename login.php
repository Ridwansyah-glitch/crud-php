<?php
session_start();

include 'config/app.php';

//check tombol login ditekan
if (isset($_POST['login'])) {

    //ambil inputan username dan password
   $username=mysqli_real_escape_string($conn,$_POST['username']);
   $password=mysqli_real_escape_string($conn,$_POST['password']);
    //check username
   $result = mysqli_query($conn,"SELECT * FROM akun WHERE username = '$username'");
    //jika ada usernay
   if (mysqli_num_rows($result)== 1) {
        //check passwordnya
        $row =mysqli_fetch_assoc($result);
        if (password_verify($password,$row['password'])) {
            //set session
            $_SESSION['login']      = true;
            $_SESSION['id']         = $row['id'];
            $_SESSION['nama']       = $row['nama'];
            $_SESSION['username']   = $row['username'];
            $_SESSION['email']      = $row['email'];
            $_SESSION['level']      = $row['level'];

            if ($_SESSION['level'] == 1) {
                header("Location:index");
                exit;
            }elseif($_SESSION['level'] == 2){
                header("Location:index");
                exit;
            }else {
                header("Location:mahasiswa");
                exit;
            }
        }


   }
   //jika tidak ada usernya/login salah
   $error =true;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/css/signin.css">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="" method="post">
            <img class="mb-4" src="assets/img/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <?php if (isset($error)) : ?>
            <div class="alert alert-danger text-center">
                <b>Username/Password salah</b>
            </div>

            <?php endif; ?>


            <div class="form-floating">
                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; <?= date('Y')?></p>
        </form>
    </main>



</body>

</html>
