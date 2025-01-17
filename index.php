
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>WECD : Admin Login</title>

  

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!--external css-->

  <link href="css/style.css" rel="stylesheet">

  <link href="css/style-responsive.css" rel="stylesheet">
    
  

</head>

<body>
  <section>
    
  <div class="container-fluid">
  
       <div class="container-fluid" style="">
      <div class="jumbotron row" style="background-color:white; margin: 10px; padding: 0px;">



</div>
            <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <form class="form-login" action="" method="POST">
          <h2 class="form-login-heading   text-center" style="background-color: #357ef4; color: white;">Admin Login <i class="fa fa-lock"></i></h2>
          <div class="login-wrap">
            <div class="form-group row">
            <div class="col-md-3" style="text-align: center;">
                <label>State Login</label>
                <input type="radio" name="login_type" value="state" checked id="admin">
              </div>
              
             
              <div class="col-md-3" style="text-align: center;">
                <label>District login</label>
                <input type="radio" name="login_type" value="district" id="">
              </div>
              <div class="col-md-3" style="text-align: center;">
                <label>Project login</label>
                <input type="radio" name="login_type" value="project" id="">
              </div>
              <div class="col-md-3" style="text-align: center;">
                <label>sector login</label>
                <input type="radio" name="login_type" value="sector" id="">
              </div>
            </div>
          </div>

        </form>
        <form method="POST" action="">
          <div id="Directer">
            <h4 style="text-align:center;">State Login</h4>
            <div class="form-group">
              <label for="text">Login Type:</label>
              <input type="text" name="type" class="form-control" value="State" readonly="">
            </div>
            <div class="form-group">
              <label for="text">Mobile Number:</label>
              <input type="Digit" name="type" class="form-control" placeholder="Enter 10 Digit Mobile Number " maxlength="10"  value="" required>
            </div>

            <div class="form-group">
              <label for="text"> Password:</label>
              <input type="password" name="password" class="form-control" value="" required="" pattern="[^'\x22]+" title="Invalid input">
            </div>

            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-info">Login</button>
            </div>
          </div>

        </form>
        
        <?php
$localhost="localhost";
$db="stu2024";
$root="root";
$password="";
$con=mysqli_connect($localhost,$root,$password, $db);



?>
       

        
        <form method="POST" action="">
          <div id="dper" style="display:none;">
            <h4 style="text-align:center;">District Login</h4>

            <div class="form-group">
              <label for="text">Login Type:</label>
              <input type="text" name="type" class="form-control" value="District" readonly="">
            </div>

            

            <div class="form-group"></div>
            <label for="text">District Name:</label>
            <select name="district" class="form-control">
              <option selected="" disabled="">Choose District Name</option>
              <?php
        // SQL query to fetch all district names from your database
        $sql = "SELECT distinct district FROM district";
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

                          <div class="form-group">
              <label for="text">Mobile Number:</label>
              <input type="Digit" name="type" class="form-control" placeholder="Enter 10 Digit Mobile Number " maxlength="10"  value="" required>
            </div>

            <div class="form-group">
              <label for="text"> Password:</label>
              <input type="password" name="password"  placeholder="Enter Password" class="form-control" value="" required="" pattern="[^'\x22]+" title="Invalid input">
            </div>

            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-info">Login</button>
            </div>


          </div>
        </form>
        
        <form method="POST" action="">
          <div id="cdper" style="display:none;">
            <h4 style="text-align:center;">Project Login</h4>

            <div class="form-group">
              <label for="type">Login Type:</label>
              <input type="text" name="type" class="form-control" value="Block" readonly="">
            </div>

            <!-- <div class="form-group"></div>
            <label for="text">District Name:</label>
            <select name="district" class="form-control">
              <option selected="" disabled="">Choose District Name</option>
                              <option value=""></option>
                          </select> -->

            <div class="form-group">
              <label for="pname">Project Name:</label>
              <select name="pname" class="form-control">
                <option selected disabled>Choose Project Name</option>
                <?php

                
                    // Fetch distinct districts from sector table
                    $sql = "SELECT DISTINCT district FROM sector";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $district = $row['district'];
                            echo '<optgroup label="' . $district . '">';
                            
                            // Fetch distinct project names for each district
                            $sql = "SELECT DISTINCT pname FROM sector WHERE district='$district'";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['pname'] . '">' . $row['pname'] . '</option>';
                                }
                            }
                            
                            echo '</optgroup>';
                        }
                    }
                    
        ?>
                   
                                    </select>
            </div>


            <div class="form-group">
              <label for="mobile">Mobile Number:</label>
              <input type="text" name="mobile" class="form-control" placeholder="Enter 10 Digit Mobile Number " maxlength="10"  value="" required>
            </div>

            

            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" name="password" class="form-control" value="" required="" pattern="[^'\x22]+" title="Invalid input">
            </div>

            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-info">Login</button>
            </div>


          </div>
        </form>
       
        <form method="POST" action="">
          <div id="sector" style="display:none;">
            <h4 style="text-align:center;">Sector Login</h4>

            <div class="form-group">
              <label for="text">Login Type:</label>
              <input type="text" name="type" class="form-control" value="sector" readonly="">
            </div>

            <!-- <div class="form-group"></div>
            <label for="text">District Name:</label>
            <select name="district" class="form-control">
              <option selected="" disabled="">Choose District Name</option>
                              <option value=""></option>
                          </select> -->

            
                          <div class="form-group"></div>
            <label for="text">District Name:</label>
            <select  class="form-control"  name="district">
              <option selected="" disabled="">Choose District Name</option>
              <?php
        // SQL query to fetch all district names from your database
        $sql = "SELECT distinct district FROM district";
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

                          <div class="form-group">
              <label for="text">Sector Name:</label>
              <select  class="form-control" name="sector">
                <option selected="" disabled="">Choose sector Name</option>
                <?php
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


            <div class="form-group">
              <label for="text">Mobile Number:</label>
              <input type="Digit" name="type" class="form-control" placeholder="Enter 10 Digit Mobile Number " maxlength="10"  value="" required>
            </div>

            

            <div class="form-group">
              <label for="text">Password:</label>
              <input type="password" name="def_password" class="form-control" value="" required="" pattern="[^'\x22]+" title="Invalid input">
            </div>

            <div class="form-group">
              <button type="submit" name="sector" class="btn btn-info">Login</button>
            </div>


          </div>
        </form>
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    </div>


  </section>
  <script>
    document.querySelectorAll('input[type="radio"][name="login_type"]').forEach(e => {
      e.addEventListener('change', function() {
        if (this.value == "state") {
          Directer.style.display = "block";
        } else {
          Directer.style.display = "none";
        }
      })
    })
  </script>
  
 

  
  
  
  <script>
    document.querySelectorAll('input[type="radio"][name="login_type"]').forEach(e => {
      e.addEventListener('change', function() {
        if (this.value == "district") {
          dper.style.display = "block";
        } else {
          dper.style.display = "none";
        }
      })
    })
  </script>
  <script>
    document.querySelectorAll('input[type="radio"][name="login_type"]').forEach(e => {
      e.addEventListener('change', function() {
        if (this.value == "project") {
          cdper.style.display = "block";
        } else {
          cdper.style.display = "none";
        }
      })
    })
  </script>

<script>
    document.querySelectorAll('input[type="radio"][name="login_type"]').forEach(e => {
      e.addEventListener('change', function() {
        if (this.value == "sector") {
          sector.style.display = "block";
        } else {
          sector.style.display = "none";
        }
      })
    })
  </script>

<?php 
$localhost="localhost";
$db="stu2024";
$root="root";
$password="";
$con=mysqli_connect($localhost,$root,$password, $db);
if(isset($_POST['sector']))
{
    $type=$_POST['type'];
    $sector=$_POST['sector'];
    $district=$_POST['district'];
    $password=$_POST['def_password'];


    $sql="SELECT * FROM sector WHERE sector='$sector' AND district='$district' AND def_password='$password'";
    $result=mysqli_query($con, $sql)or die("Error");
    if($result->num_rows >0)
    {
        echo "<script>alert('Login successfully')</script>";
        echo "<script>window.open('update.php')</script>";
        header("location:admin1.php");
        exit();
        
    
    
    }else{
      
echo"incorrect password.";
}
}
    ?>
    


 
</body>

</html>