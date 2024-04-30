

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            color: #333;
            font-size: 36px;
            font-weight: bold;
        }

        .product-details {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .product-details h2 {
            margin: 0;
            color: #333;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-details p {
            margin: 0;
            color: #333;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .product-details img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .product-details .price {
            color: #33cc33;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<?php  require ("Partials/header.php");?>
<?php

//..................get seoerate id from url.......................//

$id=$_GET['id'];
//...............Connect Db and use query..................................//
$config = require "./Connect Db/Config.php";

require("Connect Db/ConnectDb.php");
$db = new ConnectDb($config);
$getData = $db->setQuery("SELECT * FROM products WHERE id={$id}");
$getData=$getData->fetch_assoc();

//..............Get img product img in the db..............///
$imageData = $getData['image'];
$base64Image = base64_encode($imageData);

?>

<div class="container">
    <div class="header">
        <h1><?php echo $getData['name']; ?></h1>
    </div>
    <div class="product-details">
        <h2></h2>
        <img src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="">
        <h1 class="">Name:<?php echo $getData['name']; ?></h1>
        <p class="">Price:<?php echo $getData['price']; ?></p>
        <p class="">Description:<?php echo $getData['description']; ?></p>
        <p>AddtoCart:<button>+</button></p>
    </div>
    <?php
    // }
    ?>
</div>
<?php  require ("Partials/footer.php");?>
</body>
</html>

