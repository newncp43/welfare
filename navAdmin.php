<?php
session_start();
include('server.php');
if ($_SESSION['userlevel'] != 'admin') {
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


?>

<div class="ui secondary  menu">
    <a class="item1">
        <img class="logo" src="image\TIPS-logo-Blue.png">
    </a>

    <a class="item" href="add_register.php">ลงทะเบียนพนักงาน</a>
    <a class="item" href="data_employees.php">ข้อมูลพนักงาน</a>






    <div class="right menu">

        <img class="ui avatar image" src="image\avatar.png">
        <div class="ui simple dropdown item" style="top: 2px;">
            <?php echo $row_am['firstname'] ?> <?php echo $row_am['lastname'] ?> <i class="dropdown icon"><br></i>
            <div class="menu">
                <a class=" ui item" href="login.php?logout='1'  " onclick="return confirm('ต้องการออกจากระบบใช่มั้ย?')">
                    ออกจากระบบ
                </a>
            </div>
        </div>


    </div>

</div>