<?php
session_start();
require 'dbconnection.php';
//$conn->autocommit = false;

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $quantity = $_POST['quantity'];
        $user_id = $_POST['user_id'];
        $price = $_POST['product_price'];
        $product_id = $_POST['product_id'];
        

        // Check if the user is logged in
        if ($user_id == null) {
            $message = "Please log in to buy this product.";
            echo "<script>alert($message);</script>";
            header("Location: login.php");
            exit(); // Add exit after header redirect to prevent further execution
        } else {
            // Proceed with purchase
            // Ensure proper validation and sanitation of form inputs

            // Set session variables
            $_SESSION['price'] = $price;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['product_id'] = $product_id;
            $_SESSION['quantity'] = $quantity;

            // Redirect to payment page
            header("Location: payment.php");
            exit(); // Add exit after header redirect to prevent further execution

        }
    }
} catch (Exception $e) {
}
