<?php
session_start();
// Include the dbconnection.php file
require 'dbconnection.php';

// Initialize error and success message variable
$error_message = "";
$success_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['option'];

    $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
    //   $message[] = 'user already exist!';
    echo 'user already exist!';
   }else{
        // Check if passwords match
        if ($_POST['password'] === $_POST['repassword']) {
            // Sanitize and validate input data
            $firstname = mysqli_real_escape_string($conn, $firstname);
            $lastname = mysqli_real_escape_string($conn, $lastname);
            $email = mysqli_real_escape_string($conn, $email);
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $mobile = mysqli_real_escape_string($conn, $mobile);
            $gender = mysqli_real_escape_string($conn, $gender);
        
            // Construct SQL query
            $sql = "INSERT INTO User (firstname, lastname, email, password, mobile, gender) VALUES ('$firstname', '$lastname', '$email', '$password_hash', '$mobile', '$gender')";

            // Execute SQL query
            if ($conn->query($sql) === TRUE) {
                echo "Data Inserted Successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // Set error message
            $error_message = "Password and Re-type Password do not match";

            // Redirect to the previous page after displaying the error message
            echo "<script>
            alert('$error_message');
            window.location.href = 'register.php';
            </script>";
            exit; // Stop further execution of the script
        }
   }
}

// Close database connection
$conn->close();

// Output success message for JavaScript to display
echo "<script>
const success_message = '$success_message';
</script>";
?>