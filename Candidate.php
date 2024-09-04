<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/Registration.css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
// Database Connection
$localhost = "localhost";
$root = "root";
$password = "";
$db = "wecd";

$con = mysqli_connect($localhost, $root, $password, $db);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();

if (isset($_POST['submit'])) {
    $x = "BENF/";
    $y = rand(1000, 9999); // Generate a random number

    $candidate_id = $x . $y;
    // Set the current date
    $currentDate = date('Y-m-d'); // Format as 'YYYY-MM-DD'
    $district = $_POST['district'];
    $project = $_POST['project'];
    $sector = $_POST['sector'];
    $area_type = $_POST['area_type'];
    $candidate_name = $_POST['candidate_name'];
    $dob = $_POST['dob'];
    $uid_aadhar = $_POST['uid_aadhar'];
    $guardian_name = $_POST['guardian_name'];
    $guardian_mobile = $_POST['guardian_mobile'];
    $guardian_uid_aadhar = $_POST['guardian_uid_aadhar'];
    $caste_category = isset($_POST['caste_category']) ? $_POST['caste_category'] : '';
    $relation = $_POST['relation'];
    $account_holder_name = $_POST['account_holder_name'];
    $ifsc_code = $_POST['ifsc_code'];
    $gender = $_POST['gender'];
     $status ='unverified'; // Default status

    // Insert into candidate_reg table
    $sql = "INSERT INTO candidate_reg (candidate_id,  registration_date, district, project, sector, area_type, candidate_name, dob, uid_aadhar, guardian_name, guardian_mobile, guardian_uid_aadhar, caste_category, relation, account_holder_name, ifsc_code, gender, status) VALUES ('$candidate_id', '$currentDate', '$district', '$project', '$sector', '$area_type', '$candidate_name', '$dob', '$uid_aadhar', '$guardian_name', '$guardian_mobile', '$guardian_uid_aadhar', '$caste_category', '$relation', '$account_holder_name', '$ifsc_code', '$gender','$status')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('You are successfully Registered');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}
?>
    <div class="container mt-4">
        <h1 class="text-center mb-4" style="background-color: #357ef4; color: white;">Candidate Registration</h1>
        <form method="POST" action="">
            <div class="border p-4 rounded">
                <div class="mb-3">
                    <label for="district" class="form-label">District</label>
                    <input type="text" id="districtDisplay" name="district" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label for="project" class="form-label">Project</label>
                    <input type="text" id="projectDisplay" name="project" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label for="sector" class="form-label">Sector</label>
                    <input type="text" id="sectorDisplay" name="sector" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Area Type</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="area_type" value="Rural" id="area_type">
                        <label class="form-check-label" for="rural">Rural</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="area_type" value="Urban" id="area_type">
                        <label class="form-check-label" for="urban">Urban</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="candidate_name" class="form-label">Candidate Name</label>
                    <input type="text" id="candidate_name" name="candidate_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="dob" class="form-label">Candidate Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="uid_aadhar" class="form-label">Candidate UID/Aadhar No.</label>
                    <input type="text" id="uid_aadhar" name="uid_aadhar" placeholder="Enter 16 digit UID/Aadhar No." class="form-control" pattern="\d{16}" title="Please enter a 16-digit UID/Aadhar No." required>
                </div>

                <div class="mb-3">
                    <label for="guardian_name" class="form-label">Guardian Name</label>
                    <input type="text" id="guardian_name" name="guardian_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="guardian_mobile" class="form-label">Guardian Mobile No.</label>
                    <input type="text" id="guardian_mobile" name="guardian_mobile" placeholder="Enter 10 Digit Mobile No." class="form-control" pattern="\d{10}" title="Please enter a 10-digit mobile number." required>
                </div>

                <div class="mb-3">
                    <label for="guardian_uid_aadhar" class="form-label">Guardian UID/Aadhar No.</label>
                    <input type="text" id="guardian_uid_aadhar" name="guardian_uid_aadhar" placeholder="Enter 16 digit UID/Aadhar No." class="form-control" pattern="\d{16}" title="Please enter a 16-digit UID/Aadhar No." required>
                </div>

                <div class="mb-3">
                    <label for="relation" class="form-label">Relation with Head of Family</label>
                    <input type="text" id="relation" name="relation" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="caste_category" class="form-label">Caste/Category Details</label>
                    <select id="caste_category" name="caste_category" class="form-select" required>
                        <option selected disabled>Select Category</option>
                        <option value="General">General</option>
                        <option value="OBC">OBC</option>
                        <option value="SC/ST">SC/ST</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="account_holder_name" class="form-label">Account Holder Name</label>
                    <input type="text" id="account_holder_name" name="account_holder_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="ifsc_code" class="form-label">IFSC Code</label>
                    <input type="text" id="ifsc_code" name="ifsc_code" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="Male" id="male" required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="Female" id="female" required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>


                    
                </div>
                <div class="mb-3">
                    <!-- <label class="form-label">Status</label> -->
                    <!-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="verified" id="verified">
                        <label class="form-check-label" for="female">Verified</label>
                    </div> -->
                    <div class="form-check">
                        <input class="form-check-input" type="hidden" name="status" value="Unverified" id="Unverified"checked>
                        <!-- <label class="form-check-label" for="Unverified" >Unverified</label> -->
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    </div>
                    <p>Already Registered?<a href="CandidateLogin.php">login</a></p>
                   
                    </div>
                    <!-- <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#updateModal' data-id='{$row['id']}'>
                        Update Details
                    </button> -->

                
            </div>
            
        </form>
    </div>
    
    
   
    



    <script>
    // Retrieve the selected district, project, and sector from localStorage and display them
    document.addEventListener('DOMContentLoaded', function() {
        const districtDisplay = document.getElementById('districtDisplay');
        const projectDisplay = document.getElementById('projectDisplay');
        const sectorDisplay = document.getElementById('sectorDisplay');
        const selectedDistrict = localStorage.getItem('selectedDistrict');
        const selectedProject = localStorage.getItem('selectedProject');
        const selectedSector = localStorage.getItem('selectedSector');
        
        if (selectedDistrict) {
            districtDisplay.value = selectedDistrict;
        } else {
            districtDisplay.value = 'No district selected';
        }

        if (selectedProject) {
            projectDisplay.value = selectedProject;
        } else {
            projectDisplay.value = 'No project selected';
        }

        if (selectedSector) {
            sectorDisplay.value = selectedSector;
        } else {
            sectorDisplay.value = 'No sector selected';
        }
    });
    </script>
</body>
</html>
