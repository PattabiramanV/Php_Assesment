
<?php
// Start output buffering
ob_start();

// Set your custom base URL
$customBaseUrl = 'localhost://vasthira.com';

// Your HTML content here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
</head>
<body>

    <!-- Your HTML content with links -->
    <a href="/about.php">About Us</a>
    <a href="/contact.php">Contact Us</a>

</body>
</html>
<?php
// Get the buffered output
$output = ob_get_clean();

// Replace occurrences of the standard base URL with the custom base URL
$output = str_replace('://', '://' . $customBaseUrl, $output);

// Output the modified HTML content
echo $output;
?>
