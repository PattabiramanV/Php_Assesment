

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
<body class="min-h-screen">

<?php  require ("Partials/header.php");?>



<?php


$config = require "./Connect Db/Config.php";
require("Connect Db/ConnectDb.php");
$db = new ConnectDb($config);
$getData = $db->setQuery("SELECT * FROM products");

?>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4 allProducts">
    <?php while($row = $getData->fetch_assoc()) {
        $imageData = $row['image'];
        $productName=$row['name'];
        $base64Image = base64_encode($imageData);
        ?>
        <div class="">
            <img class="h-auto max-w-full rounded-lg" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="Image">
          <a href="seperateProduct.php?id=<?php echo $row['id'];  ?>"><?php echo $productName; ?></a>
        </div>
    <?php } ?>

</div>

<?php  require ("Partials/footer.php");?>
</body>
</html>