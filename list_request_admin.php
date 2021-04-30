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
    <title>รายการคำขอ</title>


</head>

<body>
    <?php include('navAdmin.php');
    $query = "SELECT * FROM tbl_request " or die("Error:" . mysqli_error($conn));
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    ?>

    <?php if (empty($row['request']) && empty($row['payment']) && empty($row['me_certificate'])) { ?>
        <br>
        <h4>
            <center>ไม่พบคำขอ</center>
        </h4>




    <?php } else { ?>

        <div class="table">
            <table class="ui single line table">
                <thead>
                    <tr>

                        <th>ลำดับที่</th>
                        <th>ผู้ใช้</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>จำนวนเงินที่ขอเบิก</th>
                        <th>เอกสารคำขอ</th>
                        <th>ใบเสร็จจ่ายเงิน</th>
                        <th>ใบรับรองแพทย์</th>
                        <th>สถานะ</th>

                    </tr>
                </thead>

                <tbody>
                    <?php do { ?>
                        <tr>
                            <td><?php echo $row['request_id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['num']; ?></td>
                            <td><a href="myfile1/<?php echo $row['request']; ?>" style="color: black;"><i class="check icon"></i></a></td>
                            <td><a href="myfile1/<?php echo $row['payment']; ?>" style="color: black;"><i class="check icon"></i></a></td>
                            <td><a href="myfile1/<?php echo $row['me_certificate']; ?>" style="color: black;"><i class="check icon"></i></a></td>
                            <td>
                                <center>
                                    <a href="accept_admin.php?act=edit&ID=<?php echo $row['request_id']; ?> class=" buttonn">
                                        <button class="ui green button">
                                            <i class="check icon"></i>
                                        </button>
                                    </a>

                                    <a href="cancle_request.php?ID=<?php echo $row['request_id']; ?>&user=<?php echo $row['username']; ?>" onclick="return confirm('คุณต้องการยกเลิกคำขอ?')" class="buttonn">
                                        <button class="ui red button but">
                                            <i class="close icon"></i>
                                        </button>
                                    </a>
                                </center>


                            </td>







                        </tr>
                    <?php } while ($row = mysqli_fetch_array($result)); ?>
                </tbody>

            </table>
        </div>

    <?php } ?>






</body>


</html>