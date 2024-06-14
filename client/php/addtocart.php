<?php
session_start();
require 'dbconnection.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $quantity = $_POST['quantity'];
        $user_id = $_POST['user_id'];
        $price = $_POST['product_price'];
        $product_id = $_POST['product_id'];
        $total_price = $quantity * $price;

        // Check if the user is logged in
        if ($user_id == null) {
            $message = "Please log in to buy this product.";
            echo "<script>alert('$message');</script>";
            header("Location: login.php");
            exit(); // Add exit after header redirect to prevent further execution
        } else {
             // Proceed with adding to cart
            // Ensure proper validation and sanitation of form inputs
            $query = "INSERT INTO `addtocart` (`product_id`, `customer_id`, `quantity`, `total_price`, `add_date`)
                      VALUES ('$product_id', '$user_id', '$quantity', '$total_price', NOW())";

            $result = mysqli_query($conn, $query);

            // Check if insertion was successful
            if ($result) {
                $message = "Product added to cart successfully!";
                echo "<script>alert('$message'); window.location.href = 'product_details.php?product_id=$product_id';</script>";
                exit();
            } else {
                $message = "Failed to add product to cart. Please try again later.";
                echo "<script>alert('$message');</script>";
            }
        }
    }
} catch (Exception $e) {
    // Handle exceptions if any
    echo "Error: " . $e->getMessage();
}
?>
