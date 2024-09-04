<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verified Candidates</title>
    <link href="css/Verified.css" rel="stylesheet">
    <!-- Adding DataTables CSS -->
    <link href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" rel="stylesheet">
   
    <!-- Adding DataTables JS -->
    <script src="https://cdn.datatables.net/2.1.4/js/jquery.dataTables.min.js"></script>
</head>
<script>
    new DataTable('#example', {
order: [[3, 'desc']]
});
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.js" rel="stylesheet"></script>


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

// Define the status value
$verified = 'verified';

// Build the SQL query based on the provided district
if (isset($_POST['district']) && !empty($_POST['district'])) {
    $selected_district = mysqli_real_escape_string($con, $_POST['district']);
    $sql = "SELECT * FROM candidate_reg WHERE district = '$selected_district' AND status = '$verified'";
} else {
    $sql = "SELECT * FROM candidate_reg WHERE status = '$verified'";
}

$result_display = mysqli_query($con, $sql);
?>

<div class="container p-3 width:100% bg-dark mt-3">
    <h2 class="heading1">Verified Candidate List</h2>
</div>


<div class="container mt-3">
    <?php
    if (mysqli_num_rows($result_display) > 0) {
        ?>
        <table id="example" class="display" style="max-width:400px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Candidate Id</th>
                    <th>District</th>
                    <th>Project</th>
                    <th>Sector</th>
                    <th>Area Type</th>
                    <th>Candidate Name</th>
                    <th>Date of Birth</th>
                    <th>UID/Aadhar No.</th>
                    <th>Guardian Name</th>
                    <th>Guardian Mobile No.</th>
                    <th>Guardian UID/Aadhar No.</th>
                    <th>Relation with Head of Family</th>
                    <th>Caste/Category Details</th>
                    <th>Account Holder Name</th>
                    <th>IFSC Code</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result_display)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['candidate_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['district']); ?></td>
                    <td><?php echo htmlspecialchars($row['project']); ?></td>
                    <td><?php echo htmlspecialchars($row['sector']); ?></td>
                    <td><?php echo htmlspecialchars($row['area_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['candidate_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['dob']); ?></td>
                    <td><?php echo htmlspecialchars($row['uid_aadhar']); ?></td>
                    <td><?php echo htmlspecialchars($row['guardian_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['guardian_mobile']); ?></td>
                    <td><?php echo htmlspecialchars($row['guardian_uid_aadhar']); ?></td>
                    <td><?php echo htmlspecialchars($row['relation']); ?></td>
                    <td><?php echo htmlspecialchars($row['caste_category']); ?></td>
                    <td><?php echo htmlspecialchars($row['account_holder_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['ifsc_code']); ?></td>
                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td>
                        <a href="Add_Payment.php?candidate_id=<?php echo htmlspecialchars($row['candidate_id']); ?>" class="btn btn-primary">Add Payment</a>
                    </td>
                    <td>
                        <a href="View_Payment.php?candidate_id=<?php echo htmlspecialchars($row['candidate_id']); ?>"  class="btn btn-primary">View Status</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "<p>No records found for verified candidates in the district.</p>";
    }
    mysqli_close($con);
    ?>
</div>
<!-- Initialize DataTables -->
<script>
        $(document).ready(function() {
            $('#example').DataTable({
                order: [[3, 'desc']]
            });
        });
    </script>


</body>
</html>
