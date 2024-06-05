<?php
$server_name = "localhost";
$username = "root";
$password = ""; 
$database_name = "login";

$conn = new mysqli($server_name, $username, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['save'])) {
    $ID = $conn->real_escape_string($_POST['ID']);
    $Name = $conn->real_escape_string($_POST['Name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $check_query = "SELECT * FROM employeelogin WHERE ID = '$ID'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
        echo "Error: ID already exists!";
    } else {
        $sql_query = "INSERT INTO employeelogin (ID, Name, email, phone) 
                      VALUES ('$ID', '$Name', '$email', '$phone')";
        if ($conn->query($sql_query) === TRUE) {
            echo "New record created successfully! ";
            echo '<a href="data.html">Home</a>';
        } else {
            echo "Error: " . $sql_query . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
