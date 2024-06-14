


<?php
require_once "dbconnection.php"; // Include database connection file

// Check if all required fields are present
if (isset($_POST['name'], $_POST['description'], $_POST['price'], $_POST['stock_quantity'], $_POST['category'], $_POST['shipping'])) {
    // Retrieve form data and sanitize
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $brand = isset($_POST['brand']) ? mysqli_real_escape_string($conn, $_POST['brand']) : '';
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = floatval($_POST['price']);
    $stock_quantity = intval($_POST['stock_quantity']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $shipping = mysqli_real_escape_string($conn, $_POST['shipping']);

    // Check if product already exists
    $select = mysqli_query($conn, "SELECT * FROM `products` WHERE p_name = '$name'");
    if (mysqli_num_rows($select) > 0) {
        echo 'Product already exists!';
    } else {
        // Check if image file was uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        } else {
            $image = ''; // If no image was uploaded
        }

        // SQL query to insert data into products table using prepared statement
        $sql = "INSERT INTO products (`p_name`, `brand`, `price`, `stock_quantity`, `description`, `image`, `category`, `shipping`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare and bind the statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdissss", $name, $brand, $price, $stock_quantity, $description, $image, $category, $shipping);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Product added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement
        $stmt->close();
    }
} else {
    echo "One or more required fields are missing.";
}

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        div {
            margin-left: 100px;
            padding: 50px;
            width: 500px;
            border: 1px solid;
            background-color: gray;
            text-align: left;
        }
    </style>
</head>

<body>
    <div>
        <h2>Add New Product</h2>
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand"><br><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea><br><br>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required><br><br>

            <label for="stock_quantity">Stock Quantity:</label>
            <input type="number" id="stock_quantity" name="stock_quantity" value="0" required><br><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image"><br><br>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required><br><br>

            <label for="shipping">Shipping:</label><br>
            <select id="shipping" name="shipping" required>
                <option value="paid">Paid</option>
                <option value="paid">Free</option>
            </select><br><br>

            <input type="submit" value="Submit">
        </form>

    </div>
</body>

</html>