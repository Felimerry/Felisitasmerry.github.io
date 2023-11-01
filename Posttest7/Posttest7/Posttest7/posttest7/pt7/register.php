<?php
require "koneksi_login.php";

if (isset($_POST["register"])) {
  $username = strtolower($_POST["username"]);
  $pass = $_POST["password"];
  $konfirmasi = $_POST["konfirmasi"];
  $role = 'user';

  // Ubah true disini
  if ($pass === $konfirmasi) {
    // Ubah pass dan result disini
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username' ");

    // Ubah true disini
    if (mysqli_fetch_assoc($result)) {
      echo "
          <script>
            alert('Username telah digunakan');
            document.location.href = 'register.php';
          </script>
        ";
    } else {
      // Ubah sql dan result disini
      $sql = "INSERT INTO users VALUES ('', '$role', '$username', '$pass')";
      $result = mysqli_query($koneksi, $sql);

      if (mysqli_affected_rows($koneksi) > 0) {
        echo "
          <script>
            alert('Registrasi berhasil');
            document.location.href = 'login.php';
          </script>
        ";
      } else {
        echo "
          <script>
            alert('Registrasi gagal');
            document.location.href = 'register.php';
          </script>
        ";
      }
    }
  } else {
    echo "
        <script>
          alert('Password tidak sama');
          document.location.href = 'register.php';
        </script>
      ";
  }
}
?>

<style>
    body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color: #f4f7f6;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.container {
  background: white;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  width: 350px;
  max-width: 100%;
  padding: 20px;
}

h3 {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
}

.inputBox {
  position: relative;
  margin-bottom: 20px;
}

.inputBox label {
  display: inline-block;
  margin-bottom: 5px;
  color: #666;
}

.inputBox input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-sizing: border-box;
}

.inputBox input:focus {
  outline-color: #667eea;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  border: none;
  background-color: #667eea;
  color: white;
  border-radius: 4px;
  cursor: pointer;
  font-size: 15px;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #5a67d8;
}

a {
  text-decoration: none;
  color: #667eea;
  display: block;
  text-align: center;
  margin-top: 10px;
  transition: color 0.3s;
}

a:hover {
  color: #5a67d8;
}

</style>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="register-login.css">
</head>

<body>
  <div class="bg">
    <div class="container">
      <form action="" method="POST">
        <h3>Register</h3>
        <div class="inputBox">
          <label for="">Username</label>
          <input type="text" name="username" placeholder="username" required>
        </div>
        <div class="inputBox">
          <label for="">Password</label>
          <input type="password" name="password" placeholder="password" required>
        </div>
        <div class="inputBox">
          <label for="">Konfirmasi Password</label>
          <input type="password" name="konfirmasi" placeholder="password" required>
        </div>
        <input type="submit" value="Register" name="register">
        <a href="login.php">Kembali</a>
      </form>
    </div>
  </div>
</body>

</html>