<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Details</title>
    <link href="css/candidate_info.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>
    <?php 
    include "config.php";
    
    // Check if connection is successful
    if (!$con) {
        die("Error: Database not connected." . mysqli_connect_error());
    }

    // Get candidate ID from URL
    $candidate_id = isset($_GET['candidate_id']) ? mysqli_real_escape_string($con, $_GET['candidate_id']) : '';

    if (!empty($candidate_id)) {
        // Fetch data from the database
        $sql_display = "SELECT candidate_reg.*, 
        add_payment.*
    FROM 
        candidate_reg
    LEFT JOIN 
        add_payment 
    ON 
        candidate_reg.candidate_id = add_payment.candidate_id 
    WHERE 
        candidate_reg.candidate_id = '$candidate_id'";
        $result_display = mysqli_query($con, $sql_display);

        if (!$result_display) {
            die("Error: " . mysqli_error($con));
        }

        // Fetch the result into an associative array
        $row = mysqli_fetch_assoc($result_display);
        
        if (!$row) {
            echo "<script>alert('No records found for this candidate.');</script>";
        }
    } else {
        echo "<script>alert('No candidate ID provided');</script>";
    }
    ?>

    <div class="container mt-4">
        
        <div class="header text-center">
            <h1>Candidate Details</h1>
<!-- <p>Contact Information</p> -->
        </div>

        <!--  Content -->
        <div class="content">
            <?php if (!empty($row)) { ?>
                <div class="row">
                    <!-- Personal Details -->
                    <div class="col-md-6">
                        <h2 class="section-title">Personal Details</h2>
                        <table class="table">
                            <tr>
                                <th>Candidate Name:</th>
                                <td><?php echo htmlspecialchars($row['candidate_name']); ?></td>
                            </tr>
                            <tr>
                                <th>Date of Birth:</th>
                                <td><?php echo htmlspecialchars($row['dob']); ?></td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td><?php echo htmlspecialchars($row['gender']); ?></td>
                            </tr>
                            <tr>
                                <th>UID/Aadhar No.:</th>
                                <td><?php echo htmlspecialchars($row['uid_aadhar']); ?></td>
                            </tr>
                            <tr>
                                <th>Guardian Name:</th>
                                <td><?php echo htmlspecialchars($row['guardian_name']); ?></td>
                            </tr>
                            <tr>
                                <th>Guardian Mobile:</th>
                                <td><?php echo htmlspecialchars($row['guardian_mobile']); ?></td>
                            </tr>
                            <tr>
                                <th>Caste/Category Details:</th>
                                <td><?php echo htmlspecialchars($row['caste_category']); ?></td>
                            </tr>
                        </table>
                    </div>

                    <!-- Account Details -->
                    <div class="col-md-6">
                        <h2 class="section-title">Account Details</h2>
                        <table class="table">
                            <tr>
                                <th>Account Holder Name:</th>
                                <td><?php echo htmlspecialchars($row['account_holder_name']); ?></td>
                            </tr>
                            <tr>
                                <th>IFSC Code:</th>
                                <td><?php echo htmlspecialchars($row['ifsc_code']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <!-- Area && Location -->
                    <div class="col-md-6">
                        <h2 class="section-title">Area && Location</h2>
                        <table class="table">
                            <tr>
                                <th>District:</th>
                                <td><?php echo htmlspecialchars($row['district']); ?></td>
                            </tr>
                            <tr>
                                <th>Project:</th>
                                <td><?php echo htmlspecialchars($row['project']); ?></td>
                            </tr>
                            <tr>
                                <th>Sector:</th>
                                <td><?php echo htmlspecialchars($row['sector']); ?></td>
                            </tr>
                            <tr>
                                <th>Area Type:</th>
                                <td><?php echo htmlspecialchars($row['area_type']); ?></td>
                            </tr>
                        </table>
                    </div>

                    <!-- Payment Status -->
                    <div class="col-md-6">
                        <h2 class="section-title">Payment Status</h2>
                        <table class="table">
                        <tr>
                                <th>Policy ID:</th>
                                <td><?php echo htmlspecialchars($row['pid']); ?></td>
                            </tr>
                            <tr>
                                <th>Initial Payment:</th>
                                <td><?php echo htmlspecialchars($row['initial_payment']); ?></td>
                            </tr>
                            <tr>
                                <th>Monthly Payment:</th>
                                <td><?php echo htmlspecialchars($row['monthly_payment']); ?></td>
                            </tr>
                            <tr>
                                <th>Payment Date:</th>
                                <td><?php echo htmlspecialchars($row['payment_date']); ?></td>
                            </tr>
                            <tr>
                                <th>Ending Date:</th>
                                <td><?php echo htmlspecialchars($row['ending_date']); ?></td>
                            </tr>
                            <tr>
                                <th>Due Date</th>
                                <td><?php echo htmlspecialchars($row['due_date']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php } ?>
        </div>

       
    </div>
</body>

</html>
