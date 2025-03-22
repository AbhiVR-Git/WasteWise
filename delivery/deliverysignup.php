<?php
// session_start();
// $connection=mysqli_connect("localhost:3307","root","");
// $db=mysqli_select_db($connection,'demo');
include '../connection.php';
$msg=0;
if(isset($_POST['sign']))
{

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $location=$_POST['district'];

    // $location=$_POST['district'];

    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sql="select * from delivery_persons where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        // echo "<h1> already account is created </h1>";
        // echo '<script type="text/javascript">alert("already Account is created")</script>';
        echo "<h1><center>Account already exists</center></h1>";
    }
    else{
    
    $query="insert into delivery_persons(name,email,password,city) values('$username','$email','$pass','$location')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
        // $_SESSION['email']=$email;
        // $_SESSION['name']=$row['name'];
        // $_SESSION['gender']=$row['gender'];
       
        header("location:delivery.php");
        // echo "<h1><center>Account does not exists </center></h1>";
        //  echo '<script type="text/javascript">alert("Account created successfully")</script>'; -->
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
        
    }
}


   
}
?>





<!DOCTYPE html>
<html lang="en">


  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="deliverycss.css">
  </head>
  <body>
    <div class="center">
      <h1>Register</h1>
      <form method="post" action=" ">
        <div class="txt_field">
          <input type="text" name="username" required/>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required/>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
            <input type="email" name="email" required/>
            <span></span>
            <label>Email</label>
          </div>
          <div class="">
                           <!-- <label for="district">District:</label> -->
                           <select id="district" name="district" style="padding:10px; padding-left: 20px;">
                           <option value="ahmednagar">Ahmednagar</option>
<option value="akola">Akola</option>
<option value="amravati">Amravati</option>
<option value="aurangabad">Aurangabad</option>
<option value="beed">Beed</option>
<option value="bhandara">Bhandara</option>
<option value="buldhana">Buldhana</option>
<option value="chandrapur">Chandrapur</option>
<option value="dhule">Dhule</option>
<option value="gadchiroli">Gadchiroli</option>
<option value="gondia">Gondia</option>
<option value="hingoli">Hingoli</option>
<option value="jalgaon">Jalgaon</option>
<option value="jalna">Jalna</option>
<option value="kolhapur">Kolhapur</option>
<option value="latur">Latur</option>
<option value="mumbai_city">Mumbai City</option>
<option value="mumbai_suburban">Mumbai Suburban</option>
<option value="nagpur">Nagpur</option>
<option value="nanded">Nanded</option>
<option value="nandurbar">Nandurbar</option>
<option value="nashik">Nashik</option>
<option value="osmanabad">Osmanabad</option>
<option value="palghar">Palghar</option>
<option value="parbhani">Parbhani</option>
<option value="pune" selected>Pune</option>
<option value="raigad">Raigad</option>
<option value="ratnagiri">Ratnagiri</option>
<option value="sangli">Sangli</option>
<option value="satara">Satara</option>
<option value="sindhudurg">Sindhudurg</option>
<option value="solapur">Solapur</option>
<option value="thane">Thane</option>
<option value="wardha">Wardha</option>
<option value="washim">Washim</option>
<option value="yavatmal">Yavatmal</option>
                        </select> 
                        
          </div>
          <br>
        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" name="sign" value="Register">
        <div class="signup_link">
          Alredy a member? <a href="deliverylogin.php">Sigin</a>
        </div>
      </form>
    </div>

  </body>
</html>
