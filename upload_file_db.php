<?php
session_start();
include('server.php');

$date1 = date("Ymd_His");
$request_id = mysqli_real_escape_string($conn, $_POST['request_id']);
$myfile1 = (isset($_POST['myfile1']) ? $_POST['myfile1'] : '');
$myfile2 = (isset($_POST['myfile2']) ? $_POST['myfile2'] : '');
$myfile3 = (isset($_POST['myfile3']) ? $_POST['myfile3'] : '');
$numrand = (mt_rand());

$upload1 = $_FILES['myfile1']['name'];
if ($upload1 <> '') {

    //โฟลเดอร์ที่เก็บไฟล์
    $path1 = "myfile1/";
    //ตัวขื่อกับนามสกุลภาพออกจากกัน
    $type1 = strrchr($_FILES['myfile1']['name'], ".");
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname1 = 'myfile1' . $numrand . $date1 . $type1;
    $path_copy1 = $path1 . $newname1;
    $path_link1 = "myfile1/" . $newname1;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['myfile1']['tmp_name'], $path_copy1);
}
$upload2 = $_FILES['myfile2']['name'];
if ($upload2 <> '') {

    //โฟลเดอร์ที่เก็บไฟล์
    $path2 = "myfile1/";
    //ตัวขื่อกับนามสกุลภาพออกจากกัน
    $type2 = strrchr($_FILES['myfile2']['name'], ".");
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname2 = 'myfile2' . $numrand . $date1 . $type2;
    $path_copy2 = $path2 . $newname2;
    $path_link2 = "myfile1/" . $newname2;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['myfile2']['tmp_name'], $path_copy2);
}

$upload3 = $_FILES['myfile3']['name'];
if ($upload3 <> '') {

    //โฟลเดอร์ที่เก็บไฟล์
    $path3 = "myfile1/";
    //ตัวขื่อกับนามสกุลภาพออกจากกัน
    $type3 = strrchr($_FILES['myfile3']['name'], ".");
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname3 = 'myfile3' . $numrand . $date1 . $type3;
    $path_copy3 = $path3 . $newname3;
    $path_link3 = "myfile1/" . $newname3;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['myfile3']['tmp_name'], $path_copy3);
}



$sql = "UPDATE tbl_request SET 
    request='$newname1',
    payment='$newname2',
    me_certificate='$newname3'
    WHERE request_id = '$request_id' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
mysqli_close($conn);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('Upload');";
    echo "window.location = 'list_request.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to Update again');";
    echo "</script>";
}
