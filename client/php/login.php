<?php
        session_start();
        // Include the dbconnection.php file
        require 'dbconnection.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve username and password from the form
            $email = $_POST['email'];
            $password = $_POST['password'];

            $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'") or die('query failed');
            
            if(mysqli_num_rows($select) > 0){
               $row = mysqli_fetch_assoc($select);
               // Verify password
               if (password_verify($password, $row['password'])) {
                   $_SESSION['user_id'] = $row['id'];
                   // Redirect to home page if authentication is successful
                   header("Location: index.php");
                   exit();
               } else {
                $message = 'Incorrect password! Try again';
                echo "<script>alert('$message'); window.location.href = 'login.php';</script>";
               }
            } else {
                $message = "User not registered! Please register now.";
                echo "<script>alert($message);</script>";
            }
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Login</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="login.php">
        <h3>Login Here</h3>
        
        <label for="username">Username</label>
        <input type="text" required placeholder="Email or Phone" id="username" name="email">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <button type="submit">Log In</button>
        <div>
            <p>or</p>
            <p><a class="r-btn" href="register.php">Register Now</a></p>
        </div>  
    </form>

    
</body>
</html>
