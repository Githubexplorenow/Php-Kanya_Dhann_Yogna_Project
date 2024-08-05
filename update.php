<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php 
$localhost="localhost";
$db="stu2024";
$root="root";
$password="";
$con=mysqli_connect($localhost,$root,$password, $db);

if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
   

    // Check if the user already exists in the database
$sql_check = "SELECT * FROM users WHERE email = '$email'";
$result = $con->query($sql_check);

if ($result->num_rows > 0) {
    // User exists, perform update query
    $sql_update = "UPDATE users SET name = '$name', mobile = '$mobile', password = '$password' WHERE email = '$email'";
    
    if ($con->query($sql_update) === TRUE) {
        echo "User details updated successfully";
    } else {
        echo "Error updating user details: " . $con->error;
    }
} else {
    // User does not exist, perform insert query
    $sql_insert = "INSERT INTO users (name, mobile, email, password) VALUES ('$name', '$mobile', '$email', '$password')";
    
    if ($con->query($sql_insert) === TRUE) {
        echo "New user inserted successfully";
    } else {
        echo "Error inserting new user: " . $conn->error;
    }
}


}
    ?>
    <div class="container    col-md-4    mt-5  text-center">
        <form method="post" action="">
        
        <h4 style="text-align:center;">Update Profile</h4>
        
        <div class="form-group">
          <label for="text">Name</label>
          <input type="text" name="name" class="form-control  mb-3" placeholder="Enter name" required>
        </div>
        <div class="form-group">
            <label for="text">Email</label>
            <input type="text" name="email" class="form-control  mb-3" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="text">Mobile</label>
            <input type="text" name="mobile" class="form-control  mb-3" placeholder="Enter Mobile" required>
          </div>
            
                
          <div class="form-group">
            <label for="text">Create new Password</label>
            <input type="text" name="password" class="form-control  mb-3" placeholder="Enter Password" required>
          </div>
            <br>
            <input type="submit"  name="update" value="submit" class="btn btn-info">
        </form>
</body>
    

</html>