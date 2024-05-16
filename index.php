

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
            background: #006400b8;
        }
    </style>
    <link rel="stylesheet" href="style.css">

</head>
<body>


<?php  require ("./Partials/header.php"); ?>

<!----------------------Body Images------------------------------->

<div class="body_img">
    <img src="homepage.jpg">
</div>

<!--------------------------------Footer----->
<?php require("./Partials/footer.php");?>
<?php
if(!empty($_GET)){
    print_r($_GET);
}
//require ("./router.php");
?>

<?php
//$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
//$host = $_SERVER['HTTP_HOST'];
//$uri = $_SERVER['REQUEST_URI'];
//
//$url = "$protocol://$host$uri";
//
//echo $url;
?>
<?php
define('CUSTOM_HOST', 'localhost://vasthira.com');

// Example usage:
$page = 'about.php'; // Example page
$url = CUSTOM_HOST . '/' . $page;

echo $url; // Outputs: localhost://vasthira.com/about.php
?>






</body>
</html>