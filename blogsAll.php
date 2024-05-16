

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <style>
        .topSearchbar>* {
            width: 50%;
        }
        .topSearchbar {
            display: flex;
            align-items: center;
            height: 100px;
        }
        .twobuttons {
            display: flex;
            gap: 20px;
        }

        .body_img {
            width: 100%;
        }
        .body_img img{
            width: 100%;
        }


        footer {
            background: rgba(0, 100, 0, 0.72);
        }
        .allProducts {
            /* height: 128px; */
            display: grid;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .allProducts>*{
            box-shadow: 0px 0px 2px gray;

        }
        .allProducts img {
            width: 200px;
        }


    </style>
</head>
<body>

<?php  require ("Partials/header.php");?>


<?php
$config = require "./Connect Db/Config.php";
require("Connect Db/ConnectDb.php");
$db = new ConnectDb($config);
$getData = $db->setQuery("SELECT * FROM users JOIN blogs ON users.id = blogs.user_id;");

?>



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Title
            </th>
            <th scope="col" class="px-6 py-3">
                Content
            </th>
            <th scope="col" class="px-6 py-3">
                Author
            </th>
            <th scope="col" class="px-6 py-3">
                Time
            </th>
            <th scope="col" class="px-6 py-3">
                sataus
            </th>
            <th scope="col" class="px-6 py-3">
                View Blog
            </th>
        </tr>

        </thead>
        <tbody>

        <?php  while($data=$getData->fetch_assoc()) { ?>
        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <?php echo $data['title'];?>
            </th>
            <td class="px-6 py-4">
                <?php echo $data['content'];?>
            </td>
            <td class="px-6 py-4">
                <?php echo $data['name'];?>
            </td>
            <td class="px-6 py-4">
                <?php echo $data['createdAt'];?>
            </td>
            <td class="px-6 py-4">
                 <?php echo $data['status'];?>
            </td>
            <td class="px-6 py-4">
                <a href="seperateBlog.php?id=<?php echo $data['id']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<?php  require ("Partials/footer.php");?>

<?php
// Define the mapping of clean URLs to PHP files
$routes = array(
    '/' => 'index.php',
    '/blogsAll' => 'blogsAll.php',
    '/contact' => 'contact.php'
);

// Extract the requested URL
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// If the requested URL doesn't end with a slash and it's not a file
if ($request_uri !== '/' && file_exists(__DIR__ . $request_uri) && !is_dir(__DIR__ . $request_uri)) {
    // Serve the requested file directly
    return false;
}

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
</body>
</html>