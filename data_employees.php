<?php
session_start();
include('server.php');







?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master\semantic.min.css">
    <link rel="stylesheet" type="text/css" href="css\style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>



    <title>ข้อมูลพนักงาน</title>
</head>

<body>
    <?php include('navAdmin.php');

    $sql = "SELECT * FROM tbl_data_employees as d INNER JOIN tbl_user as p ON d.username = p.username ORDER BY d.emp_id ASC";
    $result = mysqli_query($conn, $sql) or die("Error:" . mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);

    ?>
    <br>
    <div class="table">
        <table class="ui single line table">
            <thead>
                <tr>
                    <th>ลำดับที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ตำแหน่ง</th>
                    <th>สถานะ</th>
                    <th>ข้อมูลเพิ่มเติม</th>
                    <th>แก้ไขข้อมูล</th>
                    <th>ลบข้อมูล</th>
                </tr>
            </thead>

            <tbody>
                <?php do { ?>
                    <tr>
                        <td><?php echo $row['emp_id']; ?></td>
                        <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['type_position']; ?></td>
                        <td><?php echo $row['userlevel']; ?></td>
                        <td>

                        </td>
                        <td>
                            <center>
                                <a class="buttonn">
                                    <button class="ui green button">
                                        <i class="edit icon"></i>
                                    </button>
                                </a>
                            </center>
                        </td>
                        <td>
                            <center>
                                <a class="buttonn">
                                    <button class="ui red button but">
                                        <i class="delete icon"></i>
                                    </button>
                                </a>
                            </center>
                        </td>



                    </tr>
                <?php } while ($row = mysqli_fetch_assoc($result)); ?>
            </tbody>

        </table>
    </div>



</body>

</html>