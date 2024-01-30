<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adduser.css">
</head>

<body>
    <?php 
  
    include 'config.php';
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sqlgetdata = "SELECT name, email, gender, mail_status FROM users_details WHERE id = $id";
        mysqli_select_db($conn,$dbname);
        $result = mysqli_query($conn,$sqlgetdata);
        if(!$result) {
            die('Could not get data: ' . mysqli_error($conn));
         }
         $data = mysqli_fetch_assoc($result);
     

         
    }
    
mysqli_close($conn);
  
    ?>
    <div class="container">
        <div class="w-50 m-auto">
            <form action="<?php $_PHP_SELF?> " method="POST">

                <h2>User Update Form</h2>
                <hr>
                <p id="headParagraph">Please edit this form and submit to update user record to database.</p>

                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="<?php  if(isset($_POST["update"])){
                    echo $_POST["name"];
                }else{
                    echo $data['name'];
                }?>">

                <?php  
if(isset($_POST["update"])){
    if(empty($_POST["name"]))
{
    echo "<p>* Name is required.</p>";
}
}
?>

                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="<?php  if(isset($_POST["update"])){
                    echo $_POST["email"];
                }else{
                    echo $data['email'];
                }?>">


                <?php  
if(isset($_POST["update"])){
    if(empty($_POST["email"]))
{
    echo "<p>* Email is required.</p>";
}
}
?>

                <label for=" gender" class="form-label">Gender</label>
                <?php  
if(isset($_POST["update"])){
    if(!isset($_POST["gender"]))
{   
    echo "<span>* Gender is required.</span>";
}
}
?>
                <br>
                <input type="radio" value="f" id="female" name="gender" <?php if(isset($_POST["update"])){
                        if($_POST["gender"] == "f"){
                           echo "checked" ;
                        }
                }else{
                    if($data["gender"] == "f"){echo "checked";}
                }?>>
                <label for="female" class="form-label"> Female</label>
                <br>
                <input type="radio" value="m" id="male" name="gender" <?php if(isset($_POST["update"])){
                        if($_POST["gender"] == "m"){
                           echo "checked" ;
                        }
                }else{
                    if($data["gender"] == "m"){echo "checked";}
                }?>>
                <label for="male" class="form-label"> Male</label>
                <br>

                <input type="hidden" name="agree" value="no">
                <input id="agree" type="checkbox" name="agree" value="yes" <?php if(isset($_POST["update"])){
                        if( $_POST["agree"] == "yes"){
                            echo "checked";
                            
                        }
                }else{
                    if($data["mail_status"] == "yes"){echo "checked";}
                }
              
                
                ?>>
                <label for="agree" class="form-label"> Receive E-Mails from us.</label>



                <br>
                <input class="btn btn-success" type="submit" name="update" value="Update">
                <a class="btn btn-warning text-white" href="usersdetails.php" role="button">Users Table</a>





            </form>

        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php 

if(isset($_POST["update"]) && !empty($_POST["name"]) && !empty($_POST["email"]) && isset($_POST["gender"])){
include 'config.php';



$sqlupdate = "UPDATE users_details 
              SET name = '" . $_POST['name'] . "',
                  email = '" . $_POST['email'] . "',
                  gender = '" . $_POST['gender'] . "',
                  mail_status = '" . $_POST['agree'] . "'
                  WHERE id = $id
              ";
              



mysqli_select_db($conn,$dbname);
$retval = mysqli_query($conn,$sqlupdate);

if(!$retval) {
    die('Could not update data in table: ' . mysqli_error($conn));
 }
  
 echo "<br>" . "<div class='container'>
 <div class='w-50 m-auto'>
 <p class='text-success'>Data updated in table successfully!</p>
 </div>
 </div>
 ";
 mysqli_close($conn);

}





?>