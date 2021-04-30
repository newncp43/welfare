<?php
session_start();
include('server.php');
if ($_SESSION['userlevel'] != 'employee') {
    header('location: login.php');
}
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
$user = $_SESSION['username'];
$query = "SELECT * FROM tbl_data_employees WHERE username ='$user' " or die("Error:" . mysqli_error($conn));
$result = mysqli_query($conn, $query);
$row_am = mysqli_fetch_array($result);

$sql = "SELECT * FROM tbl_request WHERE username = '$user' " or die("Error:" . mysqli_error($conn));
$result2 = mysqli_query($conn, $sql);
$row_n = mysqli_num_rows($result2);


?>

<div class="ui secondary  menu">
    <a class="item1">
        <img class="logo" src="image\TIPS-logo-Blue.png">
    </a>


    <h1 class="textlog" style="color: #362e7e;">ระบบสารสนเทศสวัสดิการพนักงาน</h1>

    <div class="right menu">
        <div class="ui compact menu">
            <a class="item me" href="create_from_request.php">
                <i class="edit icon "></i> สร้างฟอร์มยื่นคำร้อง

            </a>
            <?php if (empty($row_n)) { ?>
                <a class="item me" href="list_request.php">
                    <i class="folder open outline icon"></i> รายการคำร้อง
                </a>
            <?php } else { ?>
                <a class="item me" href="list_request.php">
                    <i class="folder open outline icon"></i> รายการคำร้อง
                    <div class="floating ui red label"><?php echo $row_n; ?></div>
                </a>


            <?php } ?>
        </div>

        <img class="ui avatar image" src="image\avatar1.png">
        <div class="ui simple dropdown item" style="margin-bottom: 5px;">
            <?php echo $row_am['firstname'] ?> <?php echo $row_am['lastname'] ?> <i class="dropdown icon"><br></i>
            <div class="menu" style="margin-top: 0px;">
                <a class=" ui item" href="profile.php">
                    โปรไฟล์ฉัน
                </a>
                <a class=" ui item" href="history.php">
                    ประวัติการทำรายการ
                </a>
                <a class=" ui item" href="login.php?logout='1'  " onclick="return confirm('ต้องการออกจากระบบใช่มั้ย?')">
                    ออกจากระบบ
                </a>

            </div>
        </div>


    </div>

</div>