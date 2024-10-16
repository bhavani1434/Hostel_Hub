<?php
    session_start();

    include("db.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        if(!empty($email)&& !empty($password) && !is_numeric($email))
        {
            $query="select * from form where email = '$email' limit 1";
            $result=mysqli_query($con,$query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data=mysqli_fetch_assoc($result);
                    if($user_data['password']==$password)
                    {
                        header("location:file.html");
                        die;
                    }
                }
            }
            echo "<script type='text/javascript'> alert('Wrong Username or Password')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Wrong Username or Password')</script>";
        }
    }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Page</title>
    <link rel="stylesheet" href="main1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div class="container">
      <div class="login-box">
        <h2>Login</h2>
        <form method="POST">
          <div class="user-box">
            <input type="text" name="email" required="" />
            <label>Email</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" id="password" required="" />
            <label>Password</label>
            <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
            
          </div>
          <div class="sub">
                    <input type="submit" name="" value="Submit">
          </div>
        </form>
        <div class="additional-links">
            <p class="forgot-password"><a href="#">Forgot password?</a></p>
            <p class="signup-message">Don't have an account? <a href="signup1.php" class="signup-link">Sign up here</a></p>
        </div>
       
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>