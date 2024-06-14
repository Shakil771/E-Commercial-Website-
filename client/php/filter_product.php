
<?php
require 'dbconnection.php';

if (isset($_POST['categories'])) {
    $selectedCategories = $_POST['categories'];
    $categoryConditions = "'" . implode("','", $selectedCategories) . "'";
    
    // Check if the 'priceRange' key is set in the $_POST array
    $priceRange = isset($_POST['priceRange']) ? $_POST['priceRange'] : null;

    // Construct SQL query to fetch products based on selected categories and price range
    $sql = "SELECT * FROM products WHERE category IN ($categoryConditions)";

    // If a price range is selected, add condition to SQL query
    if ($priceRange) {
        $priceRangeArray = explode('-', $priceRange);
        $minPrice = $priceRangeArray[0];
        $maxPrice = $priceRangeArray[1];
        $sql .= " AND price BETWEEN $minPrice AND $maxPrice";
    }

    // Execute the query and fetch products
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
}
if (isset($result)) {
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            // Display product information
            echo "<article class='product card'>";
            echo "<div class='badge'>";
            echo "<span>" . $row['stock_quantity'] . " in stock</span>";
            echo "<hr class='hr-design'>";
            echo "<span>" . $row['units_sold'] . " sold</span>";
            echo "</div>";
            echo "<img class='product-img' src='../../admin/uploads/" . $row['image'] . "' alt='product1'>";
            echo "<div class='product-body'>";
            echo "<h3 class='product-name'>" . $row['p_name'] . "</h3>";
            echo "<p>";
            echo "<span class='dot green'></span>";
            echo "<span class='dot black'></span>";
            echo "<span class='dot red'></span>";
            echo "</p>";
            echo "<p class='product-description'>" . implode(' ', array_slice(str_word_count($row['description'], 1), 0, 10)) . "... <a href='./product_details.php' class='learn-more'>Learn More</a> </p>";
            echo "<h4 class='product-price'>" . $row['price'] . "$</h4>";
            echo "<p class='product-rating'>Rating: 4.6/5</p>";
            echo "<button class='btn product-button'>";
            echo "<a href='./product_details.php' class='learn-more'>Add To Cart</a> </p>";
            echo "</button>";
            echo "</div>";
            echo "</article>";
        }
    } else {
        echo "No products found";
    }
} else {
    $result = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            // Display product information
            echo "<article class='product card'>";
            echo "<div class='badge'>";
            echo "<span>" . $row['stock_quantity'] . " in stock</span>";
            echo "<hr class='hr-design'>";
            echo "<span>" . $row['units_sold'] . " sold</span>";
            echo "</div>";
            echo "<img class='product-img' src='../../admin/uploads/" . $row['image'] . "' alt='product1'>";
            echo "<div class='product-body'>";
            echo "<h3 class='product-name'>" . $row['p_name'] . "</h3>";
            echo "<p>";
            echo "<span class='dot green'></span>";
            echo "<span class='dot black'></span>";
            echo "<span class='dot red'></span>";
            echo "</p>";
            echo "<p class='product-description'>" . implode(' ', array_slice(str_word_count($row['description'], 1), 0, 10)) . "... <a href='./product_details.php' class='learn-more'>Learn More</a> </p>";
            echo "<h4 class='product-price'>" . $row['price'] . "$</h4>";
            echo "<p class='product-rating'>Rating: 4.6/5</p>";
            echo "<button class='btn product-button'>Add to Cart</button>";
            echo "</div>";
            echo "</article>";
        }
    } 
}
?>
