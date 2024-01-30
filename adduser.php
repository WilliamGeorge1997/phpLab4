<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adduser.css">
</head>

<body>
    <div class="container">
        <div class="w-50 m-auto mt-5">
            <form action="<?php $_PHP_SELF?> " method="POST">

                <h2>User Registration Form</h2>
                <hr>
                <p id="headParagraph">Please fill this form and submit to add user record to database.</p>

                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="<?php if(!empty($_POST["name"]) && !empty($_POST["email"])  && isset($_POST["gender"])  ){
                                echo "";
                            }elseif(isset($_POST["submit"])){
                                if(isset($_POST["name"]))
                            {
                               if(!empty($_POST["name"])){
                                echo $_POST["name"];
                               }
                            }
                            } ?>">

                <?php  
if(isset($_POST["submit"])){
    if(empty($_POST["name"]))
{
    echo "<p>* Name is required.</p>";
}
}
?>

                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="<?php if(!empty($_POST["name"]) && !empty($_POST["email"])  && isset($_POST["gender"])   ){
    echo "";
}elseif(isset($_POST["submit"])){
    if(isset($_POST["email"])){
   if(!empty($_POST["email"])){
    echo $_POST["email"];
   }
}
}?>">

                <?php  
if(isset($_POST["submit"])){
    if(empty($_POST["email"]))
{
    echo "<p>* Email is required.</p>";
}
}
?>

                <label for=" gender" class="form-label">Gender</label>
                <?php  
if(isset($_POST["submit"])){
    if(!isset($_POST["gender"]))
{   
    echo "<span>* Gender is required.</span>";
}
}
?>
                <br>
                <input type="radio" value="f" id="female" name="gender" <?php if(!empty($_POST["name"]) && !empty($_POST["email"])  && isset($_POST["gender"])  ){
    echo "";
}elseif(isset($_POST["submit"])){
    if(isset($_POST["gender"])){
        if(!empty($_POST["gender"]) && $_POST["gender"] == "f"){
            echo "checked";
        }
    }
    } ?>>
                <label for="female" class="form-label"> Female</label>
                <br>
                <input type="radio" value="m" id="male" name="gender" <?php if(!empty($_POST["name"]) && !empty($_POST["email"])  && isset($_POST["gender"])   ){
    echo "";
}elseif(isset($_POST["submit"])){
    if(isset($_POST["gender"])){
        if(!empty($_POST["gender"]) && $_POST["gender"] == "m"){
            echo "checked";
        }
    }
    } ?>>
                <label for="male" class="form-label"> Male</label>
                <br>

                <input type="hidden" name="agree" value="no">
                <input id="agree" type="checkbox" name="agree" value="yes" <?php
                if(isset($_POST["submit"]) && !empty($_POST["name"]) && !empty($_POST["email"])  && isset($_POST["gender"]) ){
                    echo "";
                }elseif(isset($_POST["submit"])){
                    if(isset($_POST["agree"])  && $_POST["agree"] == "yes")
                        echo "checked";
                }
                ?>>
                <label for="agree" class="form-label"> Receive E-Mails from us.</label>



                <br>
                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                <input class="btn btn-secondary" type="reset" value="Reset">


                <a class="btn btn-warning text-white" href="usersdetails.php" role="button">Users Table</a>


            </form>

        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php 
if(isset($_POST["submit"]) && !empty($_POST["name"]) && !empty($_POST["email"]) && isset($_POST["gender"])){
include 'config.php';



$sql = "INSERT INTO users_details (name, email, gender, mail_status)
        VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['gender'] . "', '" . $_POST['agree'] . "');";



mysqli_select_db($conn,$dbname);
$retval = mysqli_query($conn,$sql);
if(!$retval) {
    die('Could not insert to table: ' . mysqli_error($conn));
 }
  
 echo "<br>" . "<div class='container'>
 <div class='w-50 m-auto'>
 <p class='text-success'>Data inserted to table successfully!</p>
 </div>
 </div>
 ";
 mysqli_close($conn);
}





?>