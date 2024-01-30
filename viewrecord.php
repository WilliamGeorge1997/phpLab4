<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php 
   
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        $id = $_GET["id"];
    }else{
        $id = 1;
    }
    

    include 'config.php';
                $sql = "SELECT  name, email, gender, mail_status FROM users_details WHERE id = $id";
                mysqli_select_db($conn,$dbname);
                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result) == 0) {
                    echo "<p class='text-danger mt-3 ms-3'>No results, no matched id.</p>";
                }else{
                    $user = mysqli_fetch_assoc($result);    
                }
                mysqli_close($conn);
                 
    
    ?>
    <div class="container">
        <div class="w-50 m-auto">
            <?php 
            if(isset($user)){
            echo "<h2>View Record</h2>".
            "<hr>".
            "<h6>Name</h6>".
            "<p>{$user['name']}</p>".
            "<h6>Email</h6>".
            "<p>{$user['email']}</p>".
            "<h6>Gender</h6>".
            "<p>{$user['gender']}</p>".
            "<h6>Email_Status</h6>".
            "<p>{$user['mail_status']}</p>".
            "<hr>";
            }
            ?>
            <a class="btn btn-success" href="usersdetails.php" role="button">Users Table</a>
        </div>
    </div>
</body>

</html>