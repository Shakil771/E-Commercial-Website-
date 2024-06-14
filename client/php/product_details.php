<?php
include("navbar.php");
$message = null;
// Check if the product ID is set in the URL
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Now you can use $product_id in your page to fetch the details of the specific product
    $select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE id=$product_id ") or die('query failed');
    if (mysqli_num_rows($select_product) > 0) {
        $fetch_product = mysqli_fetch_assoc($select_product);
    }
    $product = mysqli_query($conn, "SELECT * FROM `products` WHERE id=$product_id");
} else {
    // Redirect or display an error message if the product ID is not set in the URL
}

?>

<!-- content -->
<section class="py-5">
    <div class="container">

        <div class="row gx-5">
            <?php if (isset($fetch_product)) : ?>
                <!-- Display product details only if $fetch_product is set -->
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="../../admin/uploads/<?php echo $fetch_product['image']; ?>" />
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" class="item-thumb">
                            <!-- <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" /> -->
                        </a>

                    </div>
                    <!-- thumbs-wrap.// -->
                    <!-- gallery-wrap .end// -->
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            <?php echo $fetch_product['p_name']; ?>
                        </h4>
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">
                                    4.5
                                </span>
                            </div>
                            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>Sold: <?php echo $fetch_product['units_sold']; ?></span>
                            <span class="text-success ms-2">In stock: <?php echo $fetch_product['stock_quantity']; ?></span>
                        </div>

                        <div class="mb-3">
                            <span class="h5">Price: $<?php echo $fetch_product['price']; ?></span>
                        </div>

                        <p>
                            <?php echo $fetch_product['description']; ?>
                        </p>

                        <div class="row">
                            <dt class="col-3">Type:</dt>
                            <dd class="col-9">Regular</dd>

                            <dt class="col-3">Color</dt>
                            <dd class="col-9">Color</dd>

                            <dt class="col-3">Brand: </dt>
                            <dd class="col-9"><?php echo $fetch_product['brand']; ?></dd>
                        </div>

                        <hr />

                        <form id="productForm" method="POST">
                            <!-- Hidden input fields for userId and productId -->
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                            <!-- Quantity input -->
                            <label class="mb-2 d-block">Quantity</label>
                            <div class="input-group mb-3" style="width: 170px;">
                               
                                <input type="number" name="quantity" value="1" class="form-control text-center border border-secondary" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                                
                            </div>
                            <button id="buyNowBtn" class="btn btn-warning shadow-0" type="submit" style="border:none">
                                Buy now
                            </button>
                            <button id="addToCartBtn" class="btn btn-warning shadow-0" type="submit" style="border:none">
                                <i class="me-1 fa fa-shopping-basket"></i> Add to cart
                            </button>
                            <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Like </a>
                        </form>




                        <script>
                            // Rest of your JavaScript code

                            document.getElementById('buyNowBtn').addEventListener('click', function() {

                                createAndSubmitForm('product_buy.php');
                            });

                            document.getElementById('addToCartBtn').addEventListener('click', function() {

                                createAndSubmitForm('addtocart.php');
                            });

                            function createAndSubmitForm(actionUrl) {
                                document.getElementById('productForm').action = actionUrl;
                                form.submit();
                            }
                        </script>
                    </div>

                </main>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- content -->

<section class="bg-light border-top py-4">
    <div class="container">
        <div class="row gx-4">
            <div class="col-lg-8 mb-4">
                <div class="border rounded-2 px-3 py-2 bg-white">
                    <!-- Pills navs -->
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item d-flex" role="presentation">
                            <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Specification</a>
                        </li>
                        <li class="nav-item d-flex" role="presentation">
                            <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">Warranty info</a>
                        </li>
                        <li class="nav-item d-flex" role="presentation">
                            <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab" aria-controls="ex1-pills-3" aria-selected="false">Shipping info</a>
                        </li>
                        <li class="nav-item d-flex" role="presentation">
                            <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-4" data-mdb-toggle="pill" href="#ex1-pills-4" role="tab" aria-controls="ex1-pills-4" aria-selected="false">Seller profile</a>
                        </li>
                    </ul>
                    <!-- Pills navs -->

                    <!-- Pills content -->
                    <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                            <p>
                                With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur.
                            </p>

                            <table class="table border mt-3 mb-2">
                                <tr>
                                    <th class="py-2">Display:</th>
                                    <td class="py-2">13.3-inch LED-backlit display with IPS</td>
                                </tr>
                                <tr>
                                    <th class="py-2">Processor capacity:</th>
                                    <td class="py-2">2.3GHz dual-core Intel Core i5</td>
                                </tr>
                                <tr>
                                    <th class="py-2">Camera quality:</th>
                                    <td class="py-2">720p FaceTime HD camera</td>
                                </tr>
                                <tr>
                                    <th class="py-2">Memory</th>
                                    <td class="py-2">8 GB RAM or 16 GB RAM</td>
                                </tr>
                                <tr>
                                    <th class="py-2">Graphics</th>
                                    <td class="py-2">Intel Iris Plus Graphics 640</td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                            Tab content or sample information now <br />
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        </div>
                        <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                            Another tab content or sample information now <br />
                            Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.
                        </div>
                        <div class="tab-pane fade mb-2" id="ex1-pills-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                            Some other tab content or sample information now <br />
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                    <!-- Pills content -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="px-0 border rounded-2 shadow-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Similar items</h5>
                            <div class="d-flex mb-3">
                                <a href="#" class="me-3">
                                    <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/8.webp" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                </a>
                                <div class="info">
                                    <a href="#" class="nav-link mb-1">
                                        Rucksack Backpack Large <br />
                                        Line Mounts
                                    </a>
                                    <strong class="text-dark"> $38.90</strong>
                                </div>
                            </div>

                            <div class="d-flex mb-3">
                                <a href="#" class="me-3">
                                    <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/9.webp" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                </a>
                                <div class="info">
                                    <a href="#" class="nav-link mb-1">
                                        Summer New Men's Denim <br />
                                        Jeans Shorts
                                    </a>
                                    <strong class="text-dark"> $29.50</strong>
                                </div>
                            </div>

                            <div class="d-flex mb-3">
                                <a href="#" class="me-3">
                                    <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/10.webp" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                </a>
                                <div class="info">
                                    <a href="#" class="nav-link mb-1"> T-shirts with multiple colors, for men and lady </a>
                                    <strong class="text-dark"> $120.00</strong>
                                </div>
                            </div>

                            <div class="d-flex">
                                <a href="#" class="me-3">
                                    <img src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/11.webp" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                </a>
                                <div class="info">
                                    <a href="#" class="nav-link mb-1"> Blazer Suit Dress Jacket for Men, Blue color </a>
                                    <strong class="text-dark"> $339.90</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
<?php include("footer.php"); ?>
<!-- Footer -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["quantity"])) {
        // Sanitize input
        $product_quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
        $product_id = mysqli_real_escape_string($conn, $_GET['product_id']);
        // Check if the user is logged in
        // if (!isset($user_id)) {
        //     $message = "Please log in to buy this product.";
        // } else {
        // Proceed with purchase
        // Ensure proper validation and sanitation of form inputs
        // Insert purchase details into the database
        $price = $fetch_product['price'];
        $total_price = $price * $product_quantity;
        $query = "INSERT INTO `productbuy`(`product_id`, `customer_id`, `quantity`, `total_price`, `price`, `purchase_date`) VALUES ('$product_id', '$user_id', '$product_quantity', '$total_price', '$price', NOW())";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $message = "Purchase successful!";
        } else {
            $message = "Failed to complete the purchase. Please try again later.";
        }
        // }
    }
}
?>