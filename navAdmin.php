<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
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

    <h1 class="textlog" style="color: #362e7e;">ระบบสารสนเทศสวัสดิการพนักงาน</h1>









    <div class="right menu">


        <div class="ui compact menu">
            <a class="item me">
                <i class="icon mail"></i> คำร้องขอ
                <div class="floating ui red label">22</div>
            </a>
            <a class="item me" href="data_employees.php">
                <i class="icon users"></i> พนักงาน
                <div class="floating ui teal label">22</div>
            </a>
            <a class="item me" href="add_register.php">
                <i class="user plus icon "></i> ลงทะเบียนพนักงาน

            </a>
        </div>

        <img class="ui avatar image" src="image\avatar.png">
        <div class="ui simple dropdown item">
            <?php echo $row_am['firstname'] ?> <?php echo $row_am['lastname'] ?> <i class="dropdown icon"><br></i>
            <div class="menu" style="margin-top: 0px;">
                <a class=" ui item" href="login.php?logout='1'">
                    ออกจากระบบ
                </a>
            </div>
        </div>


    </div>

</div>