<?php 
include 'config.php';
if(isset($_GET["id"])){
    $id = $_GET["id"];

$sql = "DELETE FROM users_details WHERE id = $id";
mysqli_select_db($conn,$dbname);
mysqli_query($conn,$sql);

mysqli_close($conn);
header("location: usersdetails.php");
}
?>