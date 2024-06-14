

<!-- <?php

require 'dbconnection.php';
session_start();
$user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// };

if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:index.php');
 };
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navigation Menu Bar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="./index.css">
</head>
<body>

    <!-- <?php
        $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_user) > 0){
            $fetch_user = mysqli_fetch_assoc($select_user);
        };
   ?> -->
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <!-- <span class="logo navLogo"><img class="logo-image" src="../image/logo.jpg" alt=""></span> -->
            <h3>Shakil</h3>
            <div class="menu">
                <ul class="nav-links">
                    <li><a href="./insert_product.php">Insert Product</a></li>
                    <li><a href="#">View Product</a></li>
                    <li><a href="#">Insert Categories</a></li>
                    <li><a href="#">Inset Brands</a></li>
                    <li><a href="#">All Orders</a></li>
                    <li><a href="#">All Payments</a></li>
                    <li><a href="#">All User</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
            <!-- <div class="profile-container" id="profileContainer">
                <div class="profile-header">
                    <img src="https://via.placeholder.com/50" alt="Profile Picture">
<!--                     
                    <?php
                        echo "<div>";
                        if(isset($fetch_user['firstname']) && $fetch_user['firstname'] != null){
                            echo "<h3>", $fetch_user['firstname'], " ",$fetch_user['lastname'], '</h3>';
                            echo "<p>", $fetch_user['email'],'</p>'; 
                         }else{
                            echo "<h3>", "Profile", "</h3>";
                         };
                         echo "</div>";
                    ?>
                    
                </div>
                <?php
                    echo "<div>";
                    if(isset($fetch_user['mobile']) && $fetch_user['mobile'] != null){
                        echo "<p>", $fetch_user['mobile'], '</p>'; 
                        echo '<a href="index.php?logout=' . $user_id . '" onclick="return confirm(\'Are you sure you want to logout?\');" class="delete-btn">Logout</a>';
                    } else {
                        echo '<a href="login.php">Login</a>';
                    }
                    echo "</div>";
                ?> 


                <div class="profile-info">
                    <p id="phone"></p>
                    <div><i class="fas fa-cog"></i> Manage your Google Account</div> 
                    
                </div>
                
            </div> -->
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
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>
                <div>
                    <button onclick="toggleProfile()">Profile</button>
                </div>
            </div>
        </div>
        
    </nav>
    <!-- header starts here -->

    

        
    

    <!-- main ends here -->
    <script>
        function toggleProfile() {
var profileContainer = document.getElementById('profileContainer');
if (profileContainer.style.display === 'none' || profileContainer.style.display === '') {
  profileContainer.style.display = 'block';
} else {
  profileContainer.style.display = 'none';
}
}
    </script>
    <script src=".//index.js"></script>
</body>
</html>
