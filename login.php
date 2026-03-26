<?php
    session_start();
    include ("connection.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
{
  @$uname=$_POST['uname'];
  @$pswd=$_POST['pswd'];
  if(!empty($uname) && !empty($pswd))
  {
    $query="SELECT * FROM signup WHERE uname='$uname' AND pswd='$pswd' ";
    $result=mysqli_query($con,$query);
    if($result)
    {
      if($result && mysqli_num_rows($result)>0)
      {
        $user_data=mysqli_fetch_assoc($result);
        if($user_data['pswd']==$pswd)
        {
          header("location:index.php");
          die;
        }
      }
    }
    echo "<script> alert('wrong username or password')</script>";
  }
  else{
    echo "<script> alert('wrong username or password')</script>";
  }
}
?> 

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class="wrapper">
            <form action="login.php" method="POST" autocomplete="off">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" name="uname" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="pswd" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" class="btn">Login</button>

                <div class="Register-link">
                    <p class="signup-link">Don't have an account? <a href="signup.php">Sign Up</a></p>
                </div>
            </form>
        </div>
    </body>
</html>