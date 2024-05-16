<?php
// Define the mapping of clean URLs to PHP files
$routes = array(
    '/' => 'index.php',
    '/blogAll' => 'blogAll.php',
    '/productAll' => 'productAll.php'
    // Add more routes as needed
);

// Extract the requested URL
$request_uri = $_SERVER['REQUEST_URI'];

// Remove query string parameters, if any
$request_uri = strtok($request_uri, '?');

// If the requested URL exists in the routes array
if (array_key_exists($request_uri, $routes)) {
    // Include the corresponding PHP file
    include $routes[$request_uri];
} else {
    // Return a 404 error
    http_response_code(404);
    include '404.php';
}
?>
