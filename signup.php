<?php    
  session_start();
  include ("connect.php");
  
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
   
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $uname=$_POST['uname'];
    $pswd=$_POST['pswd'];
    $conpswd=$_POST['conpswd'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $add=$_POST['add'];
    $dist=$_POST['dist'];
    $state=$_POST['state'];
    $gender=$_POST['gender'];
    
    if($pswd==$conpswd){

      $check="SELECT * FROM signup WHERE uname='$uname' || email='$email'";
      $result=mysqli_query($con,$check);
      $count=mysqli_num_rows($result);
      if($count>0)
      {
        echo "<script> alert('This user or email is already signed up')</script>";
      }
      else{
  
        if(!empty($uname) && !empty($pswd))
        {
          $query="INSERT INTO `signup`( `fname`, `lname`, `uname`, `pswd`,`conpswd`, `email`, `phone`, `add`, `dist`, `state` ,`gender`) 
          VALUES('$fname','$lname','$uname','$pswd','$conpswd','$email','$phone','$add','$dist','$state','$gender' )";
  
          mysqli_query($con,$query);
  
          echo "<script> alert('succssfully signup')</script>";

        }
        else{
          echo "<script> alert('please enter valid details')</script>";
        
        }
      } 
    }
    else{
      echo "<script> alert('Password and confirm password are does not match')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <h2>Sign Up</h2>
    <div class="content">
      <form action="signup.php" method="POST" autocomplete="off">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your first name" name="fname" required>
          </div>

          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your last name" name="lname" required>
          </div>
          
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="uname" required>
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" minlength="8" maxlength="8" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Enter your password" name="pswd"required>
          </div>

          <div class="input-box">
            <span class="details"> Confirm Password</span>
            <input type="password" minlength="8" maxlength="8" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Enter your Confirm password" name="conpswd"required>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" name="email" required>
          </div>

          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" minlenght="10" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57"
              placeholder="Enter your number" name="phone"required>
          </div>

          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter your address" name="add" required>
          </div>

          <div class="input-box">
            <span class="details">District</span>
            <input type="text" placeholder="Enter your district" name="dist" required>
          </div>
          <div class="input-box">
            <span class="details">State</span>
            <input type="text" placeholder="Enter your state" name="state" required>
          </div>
        
        </div>

        <label>Gender</label>
        <div class="gender">
            <input type="radio" id="male" name="gender" value="male">Male

            <input type="radio" id="female" name="gender" value="female">Female
        </div>

        </div>
        
          <button type="submit">Signup</button>
        
        <div>
        <center><p class="signup-link">Do have an account? <a href="login.php"><b>Login</b></a></p><center>
        </div>
      
      </form>
    </div>
  </div>
</body>
</html>