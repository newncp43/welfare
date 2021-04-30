<?php
session_start();
include('server.php');
$ID = $_GET["ID"];
$user = $_GET["user"];
$sql1 = "SELECT * FROM tbl_data_employees WHERE username = '$user' " or die("Error in query: $sql1 " . mysqli_error($conn));
$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($result1);

$sql3 = "SELECT * FROM tbl_request WHERE username = '$user' " or die("Error in query: $sql3 " . mysqli_error($conn));
$result3 = mysqli_query($conn, $sql3);
$row_n = mysqli_fetch_array($result3);

$limits = $row['limits'] + $row_n['num'];

$sql2 = "UPDATE tbl_data_employees SET
        limits='$limits'
        WHERE username = '$user' ";
$result2 = mysqli_query($conn, $sql2) or die("Error in query: $sql2 " . mysqli_error($conn));

$sql = "DELETE FROM tbl_request  WHERE request_id='$ID' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
mysqli_close($conn);

if ($_SESSION['userlevel'] != 'admin') {


    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('ยกเลิกสำเร็จ');";
        echo "window.location = 'list_request.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('เกิดข้อผิดพลาด กรุณาลองใหม่ภายหลัง');";
        echo "</script>";
    }
} else {
    if ($result) {

        echo "<script type='text/javascript'>";
        echo "alert('ยกเลิกสำเร็จ');";
        echo "window.location = 'list_request_admin.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('เกิดข้อผิดพลาด กรุณาลองใหม่ภายหลัง');";
        echo "</script>";
    }
}
