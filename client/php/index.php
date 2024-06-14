<?php include("navbar.php"); ?>
<!-- header starts here -->

<header class="header">
    <div class="banner ">
        <marquee class="banner-title" behavior="" direction="">50% Sales Going On</marquee>
        <div class="features flex-space-around">
            <article class="feature flex-center">
                <i class="fa-solid fa-truck feature-icon"></i>
                <h3> Shipping within 3-7days</h3>
            </article>
            <article class="feature flex-center">
                <i class="fa-brands fa-rocketchat feature-icon"></i>
                <h3> Support 24/7</h3>
            </article>
            <article class="feature flex-center">
                <i class="fa-regular fa-credit-card feature-icon"></i>
                <h3> Safe Pyment</h3>
            </article>
        </div>
    </div>
</header>

<!-- main starts here -->
<main class="flex-center">
    <div class="sidebar">
        <section class="categories-section">
            <h3 class="section-titel">Categories</h3>
            <ul class="list">
                <li class="list-item">
                    <label for="phone">
                        <input type="checkbox" name="phone" id="phone" value="phone" class="category-checkbox" />
                        Phone
                    </label>
                </li>
                <li class="list-item">
                    <label for="tablets">
                        <input type="checkbox" name="tablets" id="tablets" value="tablets" class="category-checkbox" />
                        Teblets
                    </label>
                </li>
                <li class="list-item">
                    <label for="telivisions">
                        <input type="checkbox" name="telivisions" id="telivisions" value="telivisions" class="category-checkbox" />

                        Telivisions
                    </label>
                </li>
                <li class="list-item">
                    <label for="computers">
                        <input type="checkbox" name="computers" id="computers" value="computers" class="category-checkbox" />
                        Computers
                    </label>
                </li>
                <li class="list-item">
                    <label for="headphones">
                        <input type="checkbox" name="headphones" id="headphones" value="headphones" class="category-checkbox" />
                        Headphones
                    </label>
                </li>
            </ul>
        </section>

        <section class="price-range-section">
            <h3 class="categories-titel">Price RAnge</h3>
            <ul class="list">
                <li class="list-item">
                    <label for="price1">
                        <input type="radio" class="price_range" name="price" id="price1" value="0-20" />
                        $0-$50

                    </label>
                </li>
                <li class="list-item">
                    <label for="price2">
                        <input type="radio" class="price_range" name="price" id="price2" value="51-150" />
                        $51-150
                    </label>
                </li>
                <li class="list-item">
                    <label for="price3">
                        <input type="radio" class="price_range" name="price" id="price3" value="151-250" />
                        $150-250
                    </label>
                </li>
                <li class="list-item">
                    <label for="price4">
                        <input type="radio" class="price_range" name="price" id="price4" value="251-400" />
                        $251-400
                    </label>
                </li>
                <li class="list-item">
                    <label for="price5">
                        <input type="radio" class="price_range" name="price" id="price5" value="401-700" />
                        $401-700
                    </label>
                </li>
            </ul>

        </section>

        <section class="shipping-section">
            <h3 class="categories-titel">Shipping Options</h3>
            <ul class="list">
                <li class="list-item">
                    <label for="free">
                        <input type="radio" class="shipping" name="shipping" id="free" value="Free" />
                        Free
                    </label>
                </li>
                <li class="list-item">
                    <label for="paid">
                        <input type="radio" class="shipping" name="shipping" id="paid" value="Paid" />
                        Paid
                    </label>
                </li>
            </ul>
        </section>
    </div>
    <div class="main-content">
        <!-- product section start here -->
        <section id="productsSection" class="products">
            <?php

            $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            if (mysqli_num_rows($select_product) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_product)) {
            ?>
                    <article class="product card">
                        <div class="badge">
                            <span><?php echo $fetch_product['stock_quantity']; ?> in stock</span>
                            <hr class="hr-design">
                            <span><?php echo $fetch_product['units_sold']; ?> sold</span>

                        </div>
                        <img class="product-img" src="../../admin/uploads/<?php echo $fetch_product['image']; ?>" alt="product1">
                        <div class="product-body">
                            <h3 class="product-name"><?php echo $fetch_product['p_name']; ?></h3>
                            <p>
                                <span class="dot green"></span>
                                <span class="dot black"></span>
                                <span class="dot red"></span>
                            </p>
                            <p class="product-deescription"><?php echo implode(' ', array_slice(str_word_count($fetch_product['description'], 1), 0, 10)); ?>... <a class="learn-more" href="./product_details.php?product_id=<?php echo $fetch_product['id']; ?>"> Learn More</a> </p>
                            <h4 class="product-price"><?php echo $fetch_product['price']; ?>$</h4>
                            <p class="product-rating">Rating: 4.6/5</p>
                            <button class="btn product-button">
                                <a style="color: white; text-decoration: none;" href="./product_details.php?product_id=<?php echo $fetch_product['id']; ?>">Add to Cart</a>
                            </button>

                        </div>

                    </article>
            <?php
                };
            };
            ?>

        </section>
        <div>
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </div>
        <!-- product section ends here -->
    </div>


</main>

<!-- main ends here -->
<!-- Footer -->
<?php include("footer.php"); ?>
<!-- Footer -->

</body>

</html>