<?php
session_start();
include("db.php");

$mobileError = $passwordError = ""; // Initialize error message variables

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullname = $_POST['fname'];
    $gender = $_POST['gen'];
    $mobilenumber = $_POST['mnum'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Mobile number validation: should be exactly 10 digits
    $mobileRegex = '/^[0-9]{10}$/';

    // Password validation: min 8 chars, 1 uppercase, 1 special char
    $passwordRegex = '/^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9]).{8,}$/';

    $isValid = true;

    // Validate mobile number
    if (!preg_match($mobileRegex, $mobilenumber)) {
        $mobileError = "Invalid mobile number. It should contain exactly 10 digits.";
        $isValid = false;
    }

    // Validate password
    if (!preg_match($passwordRegex, $password)) {
        $passwordError = "Password must be at least 8 characters long, include one uppercase letter, one special character, and one number.";
        $isValid = false;
    }

    // If everything is valid, proceed to insert into database
    if ($isValid) {
        if (!empty($email) && !empty($password)) {
            $query = "INSERT INTO form(fname, gen, mnum, email, password) VALUES ('$fullname', '$gender', '$mobilenumber', '$email', '$password')";

            mysqli_query($con, $query);

            echo "<script type='text/javascript'> alert('Successfully Registered...!!!')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Please enter valid information')</script>";
        }
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
    <style>
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Signup</h2>
            <form method="POST">
                <div class="user-box">
                    <input type="text" name="fname" required />
                    <label>Full Name</label>
                </div>
                <div class="user-box">
                    <input type="text" name="gen" required />
                    <label>Gender</label>
                </div>
                
                <div class="user-box">
                    <input type="tel" name="mnum" required />
                    <label>Mobile Number</label>
                    <span class="error"><?php echo $mobileError; ?></span> <!-- Mobile number error -->
                </div>
                <div class="user-box">
                    <input type="email" name="email" required />
                    <label>Email id</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" id="password" required />
                    <label>Password</label>
                    <span class="error"><?php echo $passwordError; ?></span> <!-- Password error -->
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
