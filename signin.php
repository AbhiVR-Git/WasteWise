<?php
session_start();
include 'connection.php';
// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
$msg=0;
if (isset($_POST['sign'])) {
  $email =mysqli_real_escape_string($connection, $_POST['email']);
  $password =mysqli_real_escape_string($connection, $_POST['password']);
 
  // $sanitized_emailid =  mysqli_real_escape_string($connection, $email);
  // $sanitized_password =  mysqli_real_escape_string($connection, $password);

  $sql = "select * from login where email='$email'";
  $result = mysqli_query($connection, $sql);
  $num = mysqli_num_rows($result);
 
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['gender'] = $row['gender'];
        header("location:home.html");
      } else {
        $msg = 1;
   
      }
    }
  } else {
    echo "<h1><center>Account does not exists </center></h1>";
  }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        body {
            background-color: #1E3A8A;
            color: #F9FAFB;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .regform {
            background: #F9FAFB;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            color: #1E3A8A;
        }
        .btn button {
            background-color: #FACC15;
            color: #1E3A8A;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn button:hover {
            background-color: #e5b80b;
        }
        a {
            color: #FACC15;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="regform">
            <form action="" method="post">
                <p class="logo">Waste <b style="color:#FACC15;">Wise</b></p>
                <p id="heading">Welcome back!</p>
                <div class="input">
                    <input type="email" placeholder="Email address" name="email" required />
                </div>
                <div class="password">
                    <input type="password" placeholder="Password" name="password" id="password" required />
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>
                <div class="btn">
                    <button type="submit" name="sign">Sign in</button>
                </div>
                <div class="signin-up">
                    <p>Don't have an account? <a href="signup.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="login.js"></script>
    <script src="admin/login.js"></script>
</body>

</html>