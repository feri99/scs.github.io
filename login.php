<?php
session_start();

// Check jika pengguna sudah login, arahkan ke halaman lain jika iya
if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
    exit();
}

// Cek apakah ada pengiriman formulir login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi login (biasanya berhubungan dengan database)
    if ($username === 'pengguna' && $password === 'katasandi') {
        // Simpan sesi dan arahkan ke halaman dashboard
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php
    if(isset($error)){
        echo '<p style="color:red;">'.$error.'</p>';
    }
    ?>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
