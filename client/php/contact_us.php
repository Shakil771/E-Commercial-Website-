<?php include("navbar.php"); ?>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare SQL statement to insert data into database table
    $sql = "INSERT INTO `contact_message`(`fullname`, `email`, `message`) VALUES ('$fullname', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $msg = "Message Send Successfully";
        echo "<script>alert('$msg'); window.location.href = 'contact_us.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!--$%adsense%$-->
<main class="cd__main">
    <!-- Start DEMO HTML (Use the following code into your project)-->
    <section>

        <div class="section-header">
            <div class="container">
                <h2>Contact Us</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-home"></i>
                        </div>

                        <div class="contact-info-content">
                            <h4>Address</h4>
                            <p>Sher-E-Bangla Road,<br /> Jhenaidah, Paira Chotto, <br />10556</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-phone"></i>
                        </div>

                        <div class="contact-info-content">
                            <h4>Phone</h4>
                            <p>+8809638837771</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div class="contact-info-content">
                            <h4>Email</h4>
                            <p>shakilhossaint58@gmail.com</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <form action="contact_us.php" method="post" id="contact-form">
                        <h2>Send Message</h2>
                        <div class="input-box">
                            <input type="text" required="true" name="fullname">
                            <span>Full Name</span>
                        </div>

                        <div class="input-box">
                            <input type="email" required="true" name="email">
                            <span>Email</span>
                        </div>

                        <div class="input-box">
                            <input required="true" name="message"></input>
                            <span>Type your Message...</span>
                        </div>

                        <div class="input-box">
                            <input type="submit" value="Send" name="">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

</main>
</body>

</html>