<?php
// Start session
session_start();

// Check if ID is provided
if(isset($_GET['id'])) {
    // Get ID to withdraw
    $id_to_withdraw = $_GET['id'];

    // Check if the employee ID is already withdrawn
    if (!isset($_SESSION['withdrawn_ids'])) {
        $_SESSION['withdrawn_ids'] = array();
    }

    // Add the ID to the list of withdrawn IDs
    $_SESSION['withdrawn_ids'][] = $id_to_withdraw;
}

// Redirect back to index.php
header("Location: indexui.php");
exit;
?>
