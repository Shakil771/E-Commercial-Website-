<?php
session_start();
require 'dbconnection.php';

// Retrieve session variables
$price = $_SESSION['price'];
$user_id = $_SESSION['user_id'];
$product_id = $_SESSION['product_id'];
$quantity = $_SESSION['quantity'];
$total_price = $quantity * $price;

?>


<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_number = $_POST["card-number"];
    $name_on_card = $_POST["name-on-card"];
    $expiration_date = $_POST["expiration-date"];
    $cvv = $_POST["cvv"];


    // Insert payment details into the database
    $query = "INSERT INTO `productbuy`(`product_id`, `customer_id`, `quantity`, `total_price`, `price`, `purchase_date`, `card_number`, `name_on_card`, `expiration_date`, `cvv`)
         VALUES ('$product_id', '$user_id', '$quantity', '$total_price', '$price', Now(), '$card_number', '$name_on_card', '$expiration_date', '$cvv')";

    $result = mysqli_query($conn, $query);

    // Check if insertion was successful
    if ($result) {
        $message = "Product Purchase and Payment successful!";
        echo "<script>alert('$message'); window.location.href = 'product_details.php?product_id=$product_id';</script>";
        exit();
        
    } else {
        $message = "Failed to complete the payment. Please try again later.";
        echo "<script>alert('$message');</script>";
    }
}

// Rest of your HTML and PHP code...
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="../style/payment.css">
</head>

<body>
    <div class="container">
        <div class="payment-methods">
            <h2>Select Payment Method</h2>
            <div class="payment-options">
                <div><img src="https://upload.wikimedia.org/wikipedia/commons/6/65/Credit_or_Debit_Card_Flat_Icon_Vector.svg" alt="Credit/Debit Card"></div>
                <div><img src="https://iconpusher.com/images/icons/5299/1.1.50.01.png" alt="Nagad"><br></div>
                <div><img src="https://whatthelogo.com/storage/logos/dutch-bangla-bank-110968.webp" alt="DBBL Nexus Card"></div>
                <div><img src="https://play-lh.googleusercontent.com/sDY6YSDobbm_rX-aozinIX5tVYBSea1nAyXYI4TJlije2_AF5_5aG3iAS7nlrgo0lk8=w240-h480-rw" alt="Rocket"></div>
                <div><img src="https://freelogopng.com/images/all_img/1656227753bkash-logo-png-download.png" alt="Save bKash Account"></div>
            </div>
            <form action="payment.php" method="post">
                <div class="form-group">
                    <label for="card-number">Card Number</label>
                    <input type="text" required id="card-number" name="card-number" placeholder="Card number">
                </div>
                <div class="form-group">
                    <label for="name-on-card">Name on Card</label>
                    <input type="text" required id="name-on-card" name="name-on-card" placeholder="Name on card">
                </div>
                <div class="form-group row">
                    <div>
                        <label for="expiration-date">Expiration Date</label>
                        <input type="date" required id="expiration-date" name="expiration-date" placeholder="MM/YY">
                    </div>
                    <div>
                        <label for="cvv">CVV</label>
                        <input type="text" required id="cvv" name="cvv" placeholder="CVV">
                    </div>
                </div>
                <div class="save-card">
                    <input type="checkbox" id="save-card" name="save-card">
                    <label for="save-card">Save Card</label>
                </div>
                <button type="submit" class="btn">Pay Now</button>
            </form>
        </div>
        <div class="order-summary">
            <h2>Order Summary</h2>
            <p>
                <span>Subtotal (1 Items and shipping fee included)</span>
                <span class="total">$<?php echo $total_price ?></span>
            </p>
            <p>
                <span>Total Amount</span>
                <span class="total-amount">$<?php echo $total_price ?></span>
            </p>

        </div>
    </div>
</body>

</html>