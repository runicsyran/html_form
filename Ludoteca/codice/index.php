<?php
session_start();



// Initialize the controllers
$authController = new AuthController();
$productController = new ProductController();
$invoiceController = new InvoiceController();

// Routing logic
$page = isset($_GET['page']) ? $_GET['page'] : 'login';

switch ($page) {
    case 'login':
        include 'login.php';
        break;
    case 'register':
        include 'register.php';
        break;
    case 'dashboard':
        include 'dashboard.php';
        break;
    case 'products':
        include 'products.php';
        break;
    case 'product_details':
        include 'product_details.php';
        break;
    case 'invoices':
        include 'invoices.php';
        break;
    default:
        include 'login.php';
        break;
}
?>