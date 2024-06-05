<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "login";
$conn = mysqli_connect($server_name, $username, $password, $database_name);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $sql = "DELETE FROM employeelogin WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
