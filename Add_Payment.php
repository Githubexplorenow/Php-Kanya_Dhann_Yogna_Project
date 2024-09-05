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

if (isset($_POST['submit'])) {
    $x = "PID/";
    $y = rand(1000, 9999); // Generate a random number
    $pid = $x . $y;

    $candidate_id = $_POST['candidate_id'];
    $initial_payment = $_POST['initial_payment'];
    $monthly_payment = $_POST['monthly_payment'];
    $payment_date = $_POST['payment_date'];

    // Calculate ending date
    $start_date = new DateTime($payment_date);
    $start_date->modify('+14 years');
    $ending_date = $start_date->format('Y-m-d');

   $due_date = date('Y-m-d', strtotime('+1 month', strtotime($payment_date)));
 
     // Check if there's an existing payment for this candidate on the same date or within the due period
     $sql_check = "SELECT * FROM add_payment
     WHERE candidate_id = '$candidate_id'
     AND (
         payment_date = '$payment_date'
         OR (payment_date <= '$due_date' AND due_date >= '$payment_date')
     )";
$result = mysqli_query($con, $sql_check);

if (mysqli_num_rows($result) > 0) {
echo "<script>alert('Payment already exists for this candidate on this date or within the due period.');</script>";
} else {
// Insert new payment record if no duplicate found
$sql_insert = "INSERT INTO add_payment (pid, candidate_id, initial_payment, monthly_payment, payment_date, ending_date, due_date) 
          VALUES ('$pid', '$candidate_id', '$initial_payment', '$monthly_payment', '$payment_date', '$ending_date', '$due_date')";
if (mysqli_query($con, $sql_insert)) {
echo "<script>alert('Data successfully entered');</script>";
} else {
echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h5>Add Payment</h5>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="candidate_id" class="form-label">Candidate ID</label>
                <input type="text" class="form-control" readonly name="candidate_id" value="<?php
                if (isset($_GET['candidate_id'])) {
                    $candidate_id = $_GET['candidate_id'];
                    $sql = "SELECT candidate_id FROM candidate_reg WHERE candidate_id='$candidate_id'";
                    $result = mysqli_query($con, $sql);
                    if ($row = mysqli_fetch_assoc($result)) {
                        echo $row['candidate_id'];
                    }
                }
                ?>">
            </div>
            <div class="mb-3">
                <label for="initial_payment" class="form-label">Initial Amount</label>
                <input type="number" id="initial_payment" name="initial_payment" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="payment_date" class="form-label">Payment Date</label>
                <input type="date" id="payment_date" name="payment_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="monthly_payment" class="form-label">Monthly Payment</label>
                <input type="number" id="monthly_payment" name="monthly_payment" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
</body>
</html>
