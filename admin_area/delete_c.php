<?php
session_start(); // Start the session

if (!isset($_SESSION['user_email'])) {
    echo "<script> window.open('login.php?not_admin=You are not an admin!','_self') </script>";
    exit();
} else {
    include("includes/db.php");

    if (isset($_GET['delete_c'])) {
        $delete_id = $_GET['delete_c'];
        $delete_c = "DELETE FROM customers WHERE customer_id='$delete_id'";
        $run_delete = mysqli_query($con, $delete_c) or die("Query not working");

        if ($run_delete) {
            echo "<script>alert('A Customer has been deleted..!')</script>";
            echo "<script>window.open('index.php?view_customers','_self')</script>";
        }
    }
}
?>