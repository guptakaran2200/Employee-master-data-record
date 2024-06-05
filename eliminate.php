<?php
// Start session
session_start();

// Check if ID is provided
if(isset($_GET['id'])) {
    // Store ID in session variable or cookie
    $_SESSION['eliminated_ids'][] = $_GET['id'];
}

// Redirect back to index.php
header("Location: exclude.php");
exit;
?>
