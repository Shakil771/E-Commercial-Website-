<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="../style/register.css">

    <script>
    // Display error message in a popup box if it's not empty
    window.onload = function() {
        
        const success_message = '<?php echo $success_message?>';
        if (errorMessage) {
            alert(errorMessage);
        }

    };
    </script>

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="user.php">
        <h3>Registation Here</h3>
        <label for="firstname">First Name:</label
        >
        <input
            type="text"
            id="firstname"
            name="firstname"
            required
        />

        <label for="lastname">Last Name:</label
        >
        <input
            type="text"
            id="lastname"
            name="lastname"
            required
        />

        <label for="email">Email:</label>
        <input
            type="email"
            id="email"
            name="email"
            required
        />

        <label for="password">Password:</label
        >
        <input
            type="password"
            id="password"
            name="password"
            pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$"
            title="Password must contain at least one number, 
                   one alphabet, one symbol, and be at 
                   least 8 characters long"
            required
        />

        <label for="repassword">Re-type Password:</label
        >
        <input
            type="password"
            id="repassword"
            name="repassword"
            required
        />

        <label for="mobile">Contact:</label>
        <input
            type="text"
            id="mobile"
            name="mobile"
            minlength="11"
            maxlength="15"
            required
        />
        <label for="mobile">Gender:</label>
        <div class="radio-group">
            <label><input type="radio" name="option" value="Male"> Male</label>
            <label><input type="radio" name="option" value="Female"> Female</label>
            <label><input type="radio" name="option" value="Other"> Other</label>
        </div>
        
        <button type="submit">
            Submit
        </button>
        <div>
            <p>or</p>
            <p><a class="r-btn" href="login.php">Back Login</a></p>
            
        </div>
    </form>
</body>
</html>
