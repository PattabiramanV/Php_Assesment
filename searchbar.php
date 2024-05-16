<?php
if($_GET['search']!=false){
$search=$_GET['search'];
$getData = $db->setQuery("SELECT * FROM products WHERE name like '$search%'");
print_r($getData->num_rows);
if ($getData->num_rows < 1) {
header("Location:seperateBlog.php");
exit(); // It's also good practice to exit after sending a location header
} else {
// You can optionally include the echo statement here for debugging purposes
echo "pattabi";
}

//    echo $getData;
//    if($getData->fetch_assoc()){
//        echo "pattabi";
//    }

}
else{
$getData = $db->setQuery("SELECT * FROM products WHERE id={$id}");

}