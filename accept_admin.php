<?php
session_start();
include('server.php');
$ID = $_GET["ID"];
$sql = "INSERT INTO  tbl_history SELECT * FROM tbl_request WHERE request_id='$ID'";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$sql1 = "DELETE FROM tbl_request WHERE request_id='$ID'";
$result1 = mysqli_query($conn, $sql1) or die("Error in query: $sql1 " . mysqli_error($conn));
mysqli_close($conn);
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('Succesfuly');";
    echo "window.location = 'history_admin.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to upload again');";
    echo "window.location = 'list_reuest_admin.php'; ";
    echo "</script>";
}
