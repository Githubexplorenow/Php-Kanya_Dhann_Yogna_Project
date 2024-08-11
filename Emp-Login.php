<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login </title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--external css-->
</head>

<body>

<?php
$localhost="localhost";
$db="wecd";
$root="root";
$password="";
$con=mysqli_connect($localhost,$root,$password, $db);
session_start();
if (isset($_POST['login'])) {
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $password = md5($password);
    $sql = "SELECT * FROM emp_db WHERE mobile='$mobile' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['emp_name'] = $row['emp_name'];
        
        echo "<script>alert('You are successfully login')</script>";
    echo "<script>window.open(welcome.php)</script>";
    } else {
        // Display an error message
        echo "<script>alert('Invalid credentials.')</script>";
    }
}



?>
    
    <div class="container mt-5 text-center" id="form-container">
        <form method="post" action="">

            <h4 style="text-align:center;" class="heading1">Employee Login</h4>

            <div class="form-group">
                <label for="emp_name" class="label-control">Employee Name</label>
                <input type="text" id="emp_name" name="emp_name" class="form-control " placeholder="Enter name" required>
            </div>
           

            <div class="form-group" class="label-control">
                <label for="text" class="label-control">Mobile</label>
                <input type="text" name="mobile" class="form-control   placeholder="Enter Mobile" required>
            </div>

          

          
            <div class="form-group">
                <label for="password" class="label-control">password</label>
                <input type="password" name="password" class="form-control  " required>
            </div>
            
            <input type="submit" name="login" value="login" class="btn btn-info" id="btn-control">
    </div>

    </form>


</body>

</html>