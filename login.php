<?php
session_start();

include "my.php";

if(isset($_POST['login'])) {
   $user = $_POST['username'];
   $pass = $_POST['password'];

//cek username dari database
   $query = mysqli_query($kon,"SELECT username, password FROM admin WHERE username = '$user'");
// menglistkan username dan password
   list($username, $password) = mysqli_fetch_array($query);

   if(mysqli_num_rows($query) > 0) {

    if(password_verify($pass, $password)) {
        $_SESSION["admin"] = $username;
        header('Location: adminLaundry.php');
    } else {
        $salah = true;
    }

   } else {
    $salah = true;
   }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
    body {
    margin: 0;
    padding: 0;
    height: 100vh;
    }

    #login .container #login-row #login-column #login-box {
    margin-top: 120px;
    max-width: 600px;
    height: 320px;
    background-color: #EAEAEA;
    }

    #login .container #login-row #login-column #login-box #login-form {
    padding: 20px;
    }

    #login .container #login-row #login-column #login-box #login-form #register-link {
    margin-top: -85px;
    }
    </style>
    <title>LOGIN ADMIN</title>
</head>
<body class="rgba-gradient">
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">ADMIN Laundry</h3>
                            <?php
                              if(isset($salah)) {
                                echo '<small class="text-danger font-weight-italic mx-auto">Username / Password Salah!</small>';
                                $salah = "is-invalid";
                              }
                            ?>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control <?= $salah?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control <?= $salah?>">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="login" class="btn btn-info btn-md p-2 px-4" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!--JavaScript -->
      <script src="jquery/jquery-3.4.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>