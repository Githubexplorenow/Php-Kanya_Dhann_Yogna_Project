<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/jquery.dataTables.min.js"></script>
    <style>
        .scroll-container {
            overflow-x: auto; /* Enable horizontal scrolling */
            white-space: nowrap;
        }
    </style>
</head>
<!-- Script for data Table -->
<script>
    new DataTable('#example', {
order: [[3, 'desc']]
});
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.js" rel="stylesheet"></script>


<body>
    <?php
    // Database connection
    $con = mysqli_connect("localhost", "root", "", "wecd");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Handle status update
    if (isset($_POST['update_status'], $_POST['id'], $_POST['status'])) {
        $id = intval($_POST['id']);
        $current_status = $_POST['status'];
        $new_status = $current_status === 'unverified' ? 'verified' : 'unverified';
        $verification_date = $new_status === 'verified' ? date('Y-m-d') : 'NULL';

        $update_sql = "UPDATE candidate_reg SET status = '$new_status', verification_date = $verification_date WHERE id = $id";
        mysqli_query($con, $update_sql);
    }

    // Fetch candidates if district is selected
    $result_candidates = null;
    if (isset($_POST['district']) && !empty($_POST['district'])) {
        $selected_district = mysqli_real_escape_string($con, $_POST['district']);
        $result_candidates = mysqli_query($con, "SELECT * FROM candidate_reg WHERE district = '$selected_district'");
    }
    ?>

    <div class="container p-3 bg-dark mt-3">
        <h2 class="text-center text-white">Candidate List</h2>
    </div>

    <?php if ($result_candidates && mysqli_num_rows($result_candidates) > 0) { ?>
        <table id="example" class="display" style="max-width:800px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Candidate ID</th>
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
                    <th>Action</th>
                    <th>Status</th>
                    <th>Verification Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_candidates)) {
                    $status = $row['status'] ?? 'unverified';
                    $new_status_label = $status === 'unverified' ? 'Mark as Verified' : 'Mark as Unverified';
                    $verification_date = $row['verification_date'] ?? 'Not Verified'; ?>
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
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <input type="hidden" name="status" value="<?php echo htmlspecialchars($row['status']); ?>">
                                <button type="submit" name="update_status" class="btn btn-primary">
                                    <?php echo htmlspecialchars($new_status_label); ?>
                                </button>
                            </form>
                        </td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                        <td><?php echo htmlspecialchars($verification_date); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "<div class='alert alert-info'>No records found.</div>";
    }
    mysqli_close($con);
    ?>

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
