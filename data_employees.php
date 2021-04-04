<?php
session_start();
include('server.php');


$user = $_SESSION['username'];
$sql = "SELECT * FROM tbl_data_employees as d INNER JOIN tbl_user as p ON d.username = p.username WHERE d.username ='$user'";
$result = mysqli_query($conn, $sql) or die("Error:" . mysqli_error($conn));
$row = mysqli_fetch_array($result);




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

    




    <title>ข้อมูลพนักงาน</title>
</head>

<body>
    <?php include('navAdmin.php'); ?>

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
            <?php do { ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['type_position']; ?></td>
                        <td><?php echo $row['userlevel']; ?></td>

                    </tr>

                </tbody>
            <?php } while ($row = mysqli_fetch_assoc($result)); ?>
        </table>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>