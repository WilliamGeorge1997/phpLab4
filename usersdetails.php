<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/usersdetails.css">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10">
                <h2>Users Details</h2>
            </div>
            <div class="col-md-2">

                <a class="btn btn-success" href="adduser.php" role="button">Add New User</a>
            </div>
        </div>
        <hr>
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Mail Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                include 'config.php';
                $sql = 'SELECT id, name, email, gender, mail_status FROM users_details';
                mysqli_select_db($conn,$dbname);
                $result = mysqli_query($conn,$sql);
                if(!$result) {
                    die('Could not get data: ' . mysqli_error($conn));
                 }
                 
                 if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                       echo "<tr>".
                       "<td>{$row['id']}</td>  ".
                       "<td>{$row['name']}</td> ".
                       "<td>{$row['email']}</td> ".
                       "<td id='gender'>{$row['gender']}</td> ".
                       "<td>{$row['mail_status']}</td>".
                       "<td>
                       <a href='viewrecord.php?id={$row['id']}'><i class='text-primary fa-solid fa-eye fa-lg'></i></a>
                       <a href='updateuser.php?id={$row['id']}'><i class='text-success fa-solid fa-user-pen fa-lg'></i></a>
                       <a href='deleteuser.php?id={$row['id']}'><i id='lastIcon' class='text-danger fa-solid fa-trash-can fa-lg'></i></a>
                       </td>".
                       
                       "</tr> ";
                       
                    }
                  } else {
                    echo "<p class='text-danger fs-2'>No users in database.</p>";
                  }
                
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>