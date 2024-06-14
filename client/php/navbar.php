<?php

require 'dbconnection.php';
session_start();
$user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// };

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:index.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navigation Menu Bar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/contact.css">
    <link rel="stylesheet" href="../style/cart.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <?php
    $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($select_user) > 0) {
        $fetch_user = mysqli_fetch_assoc($select_user);
    };
    ?>
    <?php
    // Count the total price and the total number of items in the cart
    $query = "SELECT SUM(total_price) AS total_price, COUNT(*) AS total_items FROM addtocart WHERE customer_id = '$user_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch the result row
        $cart_info = mysqli_fetch_assoc($result);
        $total_price = $cart_info['total_price'];
        $total_items = $cart_info['total_items'];
    } else {
        // Handle query error
        $total_price = 0; // Set default values
        $total_items = 0;
    }

    ?>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen'></i>
            <span class="logo navLogo"><img class="logo-image" src="../image/logo.jpg" alt=""></span>
            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">CodingLab</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Product</a></li>
                    <li><a href="contact_us.php">Contact</a></li>
                    <li><a href="cart.php">Cart<i class="fa-solid fa-cart-shopping"><sup><?php echo $total_items; ?></sup> </i></i></a></li>
                    <li style="color:white">Total Price: $<?php echo $total_price; ?></li>


                </ul>
            </div>
            <div class="profile-container" id="profileContainer">
                <div class="profile-header">
                    <img src="https://via.placeholder.com/50" alt="Profile Picture">

                    <?php
                    echo "<div>";
                    if (isset($fetch_user['firstname']) && $fetch_user['firstname'] != null) {
                        echo "<h3>", $fetch_user['firstname'], " ", $fetch_user['lastname'], '</h3>';
                        echo "<p>", $fetch_user['email'], '</p>';
                    } else {
                        echo "<h3>", "Profile", "</h3>";
                    };
                    echo "</div>";
                    ?>

                </div>
                <?php
                echo "<div>";
                if (isset($fetch_user['mobile']) && $fetch_user['mobile'] != null) {
                    echo "<p>", $fetch_user['mobile'], '</p>';
                    echo '<a href="index.php?logout=' . $user_id . '" onclick="return confirm(\'Are you sure you want to logout?\');" class="delete-btn">Logout</a>';
                } else {
                    echo '<a href="login.php">Login</a>';
                }
                echo "</div>";
                ?>


                <div class="profile-info">
                    <p id="phone"></p>
                    <!-- <div><i class="fas fa-cog"></i> Manage your Google Account</div> -->

                </div>

            </div>
            <div class="darkLight-searchBox d-flex">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>
                <div class="searchBox">
                    <div class="searchToggle">
                        <i class='bx bx-x cancel'></i>
                        <i class='bx bx-search search'></i>
                    </div>
                    <div class="search-field">
                        <input id="searchInput" name="search" type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>
                <div>
                    <button id="profile-button" onclick="toggleProfile()"><img class="profile-icon" src="https://via.placeholder.com/50" alt="Profile Picture"></button>
                </div>
            </div>
        </div>

    </nav>