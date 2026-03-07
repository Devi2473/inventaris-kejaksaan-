<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password']; // Di database kamu adalah admin123

    $query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$user' AND password='$pass'");
    
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['status'] = "login";
        header("location:index.php");
        exit();
    } else {
        echo "<script>alert('Username atau Password Salah!'); window.location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Inventaris</title>
    <style>
        body { background: #e9f7ef; font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .card { background: white; padding: 2rem; border-radius: 10px; border-top: 5px solid #28a745; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        input { display: block; width: 100%; margin-bottom: 1rem; padding: 0.5rem; }
        button { width: 100%; background: #28a745; color: white; border: none; padding: 0.5rem; cursor: pointer; }
    </style>
</head>
<body>
    <div class="card">
        <h3>Login Petugas</h3>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Masuk</button>
        </form>
    </div>
</body>
</html>