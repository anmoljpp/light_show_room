<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it's not already active
}

if (!isset($_SESSION['user_email'])) {
    echo "<script> window.open('login.php?not_admin=You are not an admin!','_self') </script>";
    exit();
} else {
    include("includes/db.php");

    if (isset($_GET['delete_brand'])) {
        $delete_id = $_GET['delete_brand'];
        $delete_brand = "DELETE FROM brands WHERE brand_id='$delete_id'";
        $run_delete = mysqli_query($con, $delete_brand);

        if ($run_delete) {
            echo "<script>alert('Brand has been deleted..!')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        } else {
            echo "<script>alert('Error deleting brand!')</script>";
        }
    }
}
?>