// JavaScript code here
const body = document.querySelector("body"),
  nav = document.querySelector("nav"),
  modeToggle = document.querySelector(".dark-light"),
  searchToggle = document.querySelector(".searchToggle"),
  sidebarOpen = document.querySelector(".sidebarOpen"),
  sidebarClose = document.querySelector(".sidebarClose");

let getMode = localStorage.getItem("mode");
if (getMode && getMode === "dark-mode") {
  body.classList.add("dark");
}

modeToggle.addEventListener("click", () => {
  modeToggle.classList.toggle("active");
  body.classList.toggle("dark");

  if (!body.classList.contains("dark")) {
    localStorage.setItem("mode", "light-mode");
  } else {
    localStorage.setItem("mode", "dark-mode");
  }
});

searchToggle.addEventListener("click", () => {
  searchToggle.classList.toggle("active");
});

sidebarOpen.addEventListener("click", () => {
  nav.classList.add("active");
});

body.addEventListener("click", e => {
  let clickedElm = e.target;

  if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
    nav.classList.remove("active");
  }
});

$(document).ready(function () {
  // Checkbox change event handler
  $(document).ready(function () {
    // Checkbox change event handler
    $('.category-checkbox').change(function () {
      // Get selected categories
      var categories = [];
      $('.category-checkbox:checked').each(function () {
        categories.push($(this).val());
      });

      // Make AJAX request to fetch products based on selected categories
      $.ajax({
        type: "POST",
        url: "fetch_products.php", // Specify the URL of your PHP script to fetch products
        data: {
          categories: categories
        },
        success: function (response) {
          $('#productsSection').html(response); // Display the fetched products
        }
      });
    });
  });
});
