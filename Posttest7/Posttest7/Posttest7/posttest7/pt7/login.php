<?php
require "koneksi_login.php";

session_start();

if (isset($_POST["login"])) {
  $username = strtolower($_POST["username"]);
  $pass = $_POST["password"];
  $role = $_POST["role"];

  // Ubah result disini
  $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' ");
  
  // Ubah true disini
  if (mysqli_num_rows($result) === 1) {
    // Ubah row disini
    $row = mysqli_fetch_assoc($result);
    
    // Ubah true disini
    if (password_verify(
      $pass, $row['password']
    ) and 
    ($row['role'] == 'admin') and 
    ($row['role'] == $role)) {
      
      $_SESSION["akses"] = "admin";
      header("location: ../pt6/INDEX.PHP");
      exit;
      
    // Ubah true disini
    } else if ( password_verify(
      $pass, $row['password']
    ) and 
      ($row['role'] == 'user') and 
      ($row['role'] == $role)) {

      $_SESSION["akses"] = "user";
      header("location: INDEX.PHP");
      exit;

    } else {
      echo "
        <script>
          alert('Username atau Password Anda Tidak Ada');
          document.location.href = 'login.php';
        </script>
      ";
    }
  } else {
    echo "
        <script>
          alert('Username atau Password Anda Salah');
          document.location.href = 'login.php';
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
  <title>Login</title>
  <link rel="stylesheet" href="register-login.css">
</head>

<body>
  <div class="bg">
    <div class="container">
      <form action="" method="POST">
        <h3>Login</h3>
        <div class="inputBox">
          <label for="">Username</label>
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="inputBox">
          <label for="">Password</label>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="inputBox">
          <label for="">Role</label>
          <select name="role" class="roles" id="" required>
            <option value="">Select Role</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
        </div>
        <input type="submit" value="Login" name="login">
        <div class="links">
          <p>Belum punya akun?</p>
          <a href="register.php" class="khusus">Register</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>