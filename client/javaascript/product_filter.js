$(document).ready(function() {
    // Checkbox and radio button change event handler
    $('.category-checkbox, .price_range').change(function() {
        // Get selected categories
        var categories = [];
        $('.category-checkbox:checked').each(function() {
            categories.push($(this).val());
        });

        // Get selected price range
        var priceRange = $('input[name=price]:checked').val();

        // Make AJAX request to fetch products based on selected categories and price range
        $.ajax({
            type: "POST",
            url: "filter_product.php", // Specify the URL of your PHP script to fetch products
            data: {
                categories: categories,
                priceRange: priceRange // Pass selected price range to PHP script
            },
            success: function(response) {
                $('#productsSection').html(response); // Display the fetched products
            }
        });
    });
});
