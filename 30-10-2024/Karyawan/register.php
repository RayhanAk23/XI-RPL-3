<?php
//register.php
require_once 'config/connect.php';
require_once 'classes/user.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($user->register($username, $password)) {
        $success_message = "Registrasi berhasil silahkan login";
    } else {
        $error_message = "Registrasi gagal. Username Mungkin sudah di gunakan.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center">Register</h3>
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($error_message); ?>
                    </div>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="form-group mb-3">
                       <label>Username</label>
                       <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                       <label>Password</label>
                       <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    <p class="text-center mt-3">suadah punya akun?
                    <a href="index.php">login di sini</a>
                </form>
            </div>
       </div>
   </div>              
</body>
</html>
