<?php include("navbar.php"); ?>
<?php
require 'dbconnection.php';
session_start();
$user_id = $_SESSION['user_id'];

// Retrieve cart history (list of products in the cart)
$cart_history_query = mysqli_query($conn, "SELECT * FROM `addtocart` WHERE customer_id = '$user_id'") or die('Cart history query failed');

// Display cart history
?>

    <h1>Cart History</h1>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Check Out</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($cart_history_query)): ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['total_price']; ?></td>
                    <td><a href="a">Check Out Now</a></td>
                    <!-- Add more columns as needed -->
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

