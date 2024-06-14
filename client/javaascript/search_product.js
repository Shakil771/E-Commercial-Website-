$(document).ready(function() {
    // Function to fetch products based on search query
    function fetchProducts(searchQuery) {
        $.ajax({
            type: "POST",
            url: "search_product.php",
            data: {
                searchQuery: searchQuery
            },
            success: function(response) {
                $('#productsSection').html(response); // Display the fetched products
            }
        });
    }

    // Search field change event handler
    $('.search-field input').on('input', function() {
        var searchQuery = $(this).val(); // Get the search query from the input field
        fetchProducts(searchQuery); // Fetch products based on the search query
    });
});
