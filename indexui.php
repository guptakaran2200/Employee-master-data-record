<?php
// Start session
session_start();

// Define database connection parameters
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "login";

// Establish database connection
$conn = mysqli_connect($server_name, $username, $password, $database_name);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Fetch all employees
$sql = "SELECT * FROM employeelogin";
$result = $conn->query($sql);

// Initialize array to store withdrawn IDs
$withdrawn_ids = [];

// Check if session variable exists
if(isset($_SESSION['withdrawn_ids'])) {
    $withdrawn_ids = $_SESSION['withdrawn_ids'];
}

// Output HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <h1>Master data of the employees</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Withdraw</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through each employee
            while ($row = $result->fetch_assoc()) {
                // Check if current ID is withdrawn
                if (!in_array($row["id"], $withdrawn_ids)) {
                    // Output data if not withdrawn
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["phone"] . "</td>
                            <td><a href='update.php?id=" . $row["id"] . "' class='btn btn-primary'>Update</a></td>
                            <td><a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>
                            <td><a href='withdraw.php?id=" . $row["id"] . "' class='btn btn-warning'>Withdraw</a></td>
                          </tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>
