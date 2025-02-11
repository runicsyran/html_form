// This file contains JavaScript functionality for the application.

// Function to handle login form submission
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Perform AJAX request to login
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'dashboard.php'; // Redirect to dashboard
        } else {
            alert(data.message); // Show error message
        }
    })
    .catch(error => console.error('Error:', error));
});

// Function to handle registration form submission
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    const username = document.getElementById('regUsername').value;
    const password = document.getElementById('regPassword').value;

    // Perform AJAX request to register
    fetch('register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'login.php'; // Redirect to login page
        } else {
            alert(data.message); // Show error message
        }
    })
    .catch(error => console.error('Error:', error));
});

// Function to fetch and display products
function fetchProducts() {
    fetch('products.php')
    .then(response => response.json())
    .then(data => {
        const productTable = document.getElementById('productTable');
        productTable.innerHTML = ''; // Clear existing table data

        data.products.forEach(product => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${product.name}</td>
                <td>${product.price}</td>
                <td><a href="product_details.php?id=${product.id}">Details</a></td>
            `;
            productTable.appendChild(row);
        });
    })
    .catch(error => console.error('Error fetching products:', error));
}

// Call fetchProducts on page load for products page
if (document.getElementById('productTable')) {
    fetchProducts();
}