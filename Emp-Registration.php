<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details Form</title>
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
if(isset($_POST['submit']))
{
    $emp_name=$_POST['emp_name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $desig=$_POST['desig'];
    $district=$_POST['district'];
    $project=$_POST['project'];
    $sector=$_POST['sector'];
    $status=$_POST['status'];
    
    
    $password=$_POST['password'];
   

    // Check if the user already exists in the database
$sql_check = "SELECT * FROM emp_db WHERE email = '$email'";
$result = $con->query($sql_check);

if ($result->num_rows > 0) {
    // User exists, perform update query
    $sql_update = "UPDATE emp_db SET emp_name = '$emp_name', mobile = '$mobile', password = '$password' WHERE email = '$email'";
    
    if ($con->query($sql_update) === TRUE) {
        echo "User details updated successfully";
    } else {
        echo "Error updating user details: " . $con->error;
    }
} else {
    // User does not exist, perform insert query
    $sql_insert = "INSERT INTO  emp_db (emp_name, mobile, email,  desig, district, project, sector, status, password) VALUES ('$emp_name', '$mobile', '$email', '$desig', '$district', '$project', '$sector', '$status', '$password')";
    
    if ($con->query($sql_insert) === TRUE) {
        echo "New user inserted successfully";
    } else {
        echo "Error inserting new user: " . $con->error;
    }
}
}




?>
    
    <div class="container mt-5 text-center" id="form-container">
        <form method="post" action="">

            <h4 style="text-align:center;" class="heading1">Employee Registration</h4>

            <div class="form-group">
                <label for="emp_name" class="label-control">Employee Name</label>
                <input type="text" id="emp_name" name="emp_name" class="form-control " placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="text" class="label-control">Designation</label>
                <select  class="form-control" name="desig">
              <option selected="" disabled="">Choose Designation name</option>
              <option value="" name="desig">DPO</option>
              <option value="" name="desig">CDPO</option>
              <option value="" name="desig">Supervisor</option>
              </select>
              
            </div>

            <div class="form-group" class="label-control">
                <label for="text" class="label-control">Mobile</label>
                <input type="text" name="mobile" class="form-control  " maxlength="10" placeholder="Enter Mobile" required>
            </div>

            <div class="form-group" class="label-control">
                <label for="text" class="label-control">Email</label>
                <input type="text" name="email" class="form-control " placeholder="Enter email" required>
            </div>

            <div class="form-group">
                <label for="text" class="label-control">District Name:</label>
                
                <select name="district" class="form-control ">
                    <option selected="" disabled="" >Choose District Name</option>
        <?php
        // SQL query to fetch all district names from your database
        $sql = "SELECT  distinct district FROM district";
        $result = $con->query($sql);

        // Check if any districts are found
        if ($result->num_rows > 0) {
            // Output data of each row as an option in the dropdown
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['district'] . "'>" . $row['district'] . "</option>";
            }
        } else {
            echo "<option value=''>No districts found</option>";
        }
        ?>


                </select>
            </div>




            <div class="form-group">
                <label for="text" class="label-control">Project Name:</label>
                <select type="" class="form-control"   name="project">
                    <option selected="" disabled="">Choose Project Name</option>
                    <?php
                    // Database connection
                    $localhost = "localhost";
                    $db = "wecd";
                    $root = "root";
                    $password = "";
                    $con = mysqli_connect($localhost, $root, $password, $db);
                    if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Fetch distinct districts from sector table
                    $sql_district = "SELECT DISTINCT district FROM sector";
                    $result_district = mysqli_query($con, $sql_district);
                    if (mysqli_num_rows($result_district) > 0) {
                        while ($row_district = mysqli_fetch_assoc($result_district)) {
                            $district = $row_district['district'];
                            echo '<optgroup label="' . $district . '">';
                            
                            // Fetch distinct project names for each district
                            $sql_project = "SELECT DISTINCT pname FROM sector WHERE district='$district'";
                            $result_project = mysqli_query($con, $sql_project);
                            if (mysqli_num_rows($result_project) > 0) {
                                while ($row_project = mysqli_fetch_assoc($result_project)) {
                                    echo '<option value="' . $row_project['pname'] . '">' . $row_project['pname'] . '</option>';
                                }
                            }
                            
                            echo '</optgroup>';
                        }
                    }
                    mysqli_close($con);
                    ?>


                </select>
            </div>

            <div class="form-group">
              <label for="text" class="label-control">Sector Name:</label>
              <select type=""  class="form-control" name="sector">
                <option selected="" disabled="" name="sector" >Choose sector Name</option>
                <?php
                $localhost="localhost";
                $db="wecd";
                $root="root";
                $password="";
                $con=mysqli_connect($localhost,$root,$password, $db);
                
        // SQL query to fetch all district names from your database
        $sql = "SELECT sector FROM sector";
        $result = $con->query($sql);

        // Check if any districts are found
        if ($result->num_rows > 0) {
            // Output data of each row as an option in the dropdown
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['pname'] . "'>" . $row['sector'] . "</option>";
            }
        } else {
            echo "<option value=''>No districts found</option>";
        }
        ?>
                   
                                    </select>
            </div>
            <div class= "form-group"style="text-align: center;">
                <label for="text"class="label-control">status</label>
                <input type="radio"id="text" name="status" checked id="admin"><span style="padding: 20px;">Unverified</span>
                <input type="radio"id="text" name="status"><span>Verified</span>
            </div>
            <div class="form-group">
                <label for="password" class="label-control">password</label>
                <input type="password" name="password" class="form-control  " required>
            </div>
            
            <input type="submit" name="submit" value="submit" class="btn btn-info" id="btn-control">
    </div>

    </form>


</body>

</html>