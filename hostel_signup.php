<?php
    session_start();

    include("db2.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $fullname=$_POST['fname'];
        $gender=$_POST['gen'];
        $mobilenumber=$_POST['mnum'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        if(!empty($email)&& !empty($password) && !is_numeric($email))
        {
            $query= "insert into form(fname,gen,mnum,email,password) values('$fullname','$gender','$mobilenumber','$email','$password')";

            mysqli_query($con,$query);

            echo "<script type='text/javascript'> alert('Succesfully Registered...!!')</script>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('Please enter valid information')</script>";
        
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Signup Page</title>
    <link rel="stylesheet" href="main1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2> OwnerSignup</h2>
            <form method="POST">
                <div class="user-box">
                    <input type="text" name="fname" required="" />
                    <label>Full Name</label>
                </div>
                <div class="user-box">
                    <input type="text" name="gen" required="" />
                    <label>Gender</label>
                </div>

                
                <div class="user-box">
                    <input type="tel" name="mnum" required="" />
                    <label>Mobile Number</label>
                </div>
                <div class="user-box">
                    <input type="email" name="email" required="" />
                    <label>Email id</label>
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
                <p>By clicking the signup button, you agree to our <br>
                    <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                </p>
                <p>Already have an account? <a href="login1.php">Login Here</a></p>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
