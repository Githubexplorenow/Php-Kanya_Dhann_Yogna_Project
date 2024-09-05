<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <link href="css/style.css" rel="stylesheet">
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
    include "config.php"; // Ensure your database connection is established
    // Check if connection successful
    if (!$con) {
        die("Error: Database not connected." . mysqli_connect_error());
    }

    $candidate_id = isset($_GET['candidate_id']) ? mysqli_real_escape_string($con, $_GET['candidate_id']) : '';

    if (!empty($candidate_id)) {
        // Fetch data from the database
        $sql_display = " 
            SELECT 
                candidate_reg.candidate_id, 
                candidate_reg.candidate_name, 
                 add_payment.pid, 
                  add_payment.initial_payment, 
                add_payment.monthly_payment, 
                add_payment.payment_date, 
                add_payment.ending_date
                add_payment.due_date
            FROM 
                candidate_reg
            INNER JOIN 
                add_payment
            ON 
                candidate_reg.candidate_id = add_payment.candidate_id 
            WHERE 
                candidate_reg.candidate_id = '$candidate_id'
        ";

        $result_display = mysqli_query($con, $sql_display);
        if (!$result_display) {
            die("Error: " . mysqli_error($con));
        }
    } else {
        echo "<script>alert('No candidate ID provided');</script>";
    }
    ?>

    <div class="container  p-3  width:100%  bg-dark mt-3">
        <h2 class="text-center text-white">View Payment</h2>
    </div>

    <div class="container mt-3">
        <?php 
        if (isset($result_display) && mysqli_num_rows($result_display) > 0) {
        ?>
           <table id='example'class='display' >

                <thead>
                    <tr>
                        <th>Candidate ID</th>
                        <th>Candidate Name</th>
                        <th>Policy ID</th>
                        <th>Initial Payment</th>
                        <th>Monthly Payment</th>
                        <th>Payment Date</th>
                        <th>Ending Date</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_display)) { ?>
                        <tr>

                            <td><?php echo htmlspecialchars($row['candidate_id']); ?></td>
                            
                            <td><?php echo htmlspecialchars($row['candidate_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['pid']); ?></td>
                            <td><?php echo htmlspecialchars($row['initial_payment']); ?></td>
                            <td><?php echo htmlspecialchars($row['monthly_payment']); ?></td>
                            <td><?php echo htmlspecialchars($row['payment_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['ending_date']); ?></td>
                              <td><?php echo htmlspecialchars($row['due_date']); ?></td>
                            <td>
                                <?php echo"
                     <a href='View_Details.php?candidate_id=".htmlspecialchars($row['candidate_id']); ?>'   class="btn btn-primary">View Status</a>
                    
                        
                </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Initialize DataTables -->

    <?php
        
        } else {
            echo "<p>No records found for this candidate.</p>";
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
