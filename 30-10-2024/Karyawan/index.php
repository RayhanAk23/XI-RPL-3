<?php
// login.php
require 'config/connect.php';
require 'classes/user.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

session_start();
if (isset($_SESSION['username'])) {
    header("Location: ./dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Proses login jika input tidak kosong
    if (!empty($username) && !empty($password)) {
        if ($user->login($username, $password)) {
            header("Location: ./dashboard.php");
            exit();
        } else {
            $error_message = "Username atau Password salah!";
        }
    } else {
        $error_message = "Username dan Password harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center">L o g i n</h3>
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
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <p class="text-center mt-3">belum punya akun?
                    <a href="register.php" class="btn btn-warning btn-block">register</a></p>
                </form>
            </div>
       </div>
   </div>              
</body>
</html>
