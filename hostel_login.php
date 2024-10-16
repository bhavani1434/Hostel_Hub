<?php
session_start();
include("db2.php"); // Include your database connection file

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $hostelid = $_POST['hostelid'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM signup WHERE hostelid = '$hostelid' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        $_SESSION['login_user'] = $hostelid;
        $hostel_page = $row['hostel_page']; // Retrieve hostel page name from the database
        header("location: $hostel_page"); // Redirect to the retrieved hostel page
        exit();
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main1.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <p><h2><u>Hostel Owner's Login </u></h2></p>
    <p> </p>
    <p> </p>

    

        <p><label for="hostelid">Hostel ID:</label></P>
        <input type="text" name="hostelid" id="hostelid" required><br><br>
        
        <P><label for="password">Password:</label></p>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
    <p><?php echo $error; ?></p>
</body>
</html>
