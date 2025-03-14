<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it's not already active
}


if(!isset($_SESSION['user_email'])) {
    echo "<script> window.open('login.php?not_admin=You are not an admin!','_self') </script>";
    exit();
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Categories</title>
</head>
<body>
    <table width="1078" align="center" bgcolor="skyblue">
        <tr align="center">
            <td colspan="6"><h2><br>View All Categories Here<br><br></h2></td>
        </tr>
        <tr align="center" bgcolor="skyblue">
            <th><br>S.NO</th>
            <th><br>Category ID</th>
            <th><br>Category Title</th>
            <th><br>Edit</th>
            <th><br>Delete</th>
        </tr>
        <?php
        include("includes/db.php");

        $get_cat = "SELECT * FROM categories";
        $run_cat = mysqli_query($con, $get_cat);
        $i = 0;

        while($row_cat = mysqli_fetch_array($run_cat)) {
            $cat_id = $row_cat['cat_id'];
            $cat_title = $row_cat['cat_title'];
            $i++;
        ?>
        <tr align="center">
            <td><br><?php echo $i; ?></td>
            <td><br><?php echo $cat_id; ?></td>
            <td><br><?php echo $cat_title; ?></td>
            <td><br><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
            <td><br><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php } ?>