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
    <?php include('navEmployee.php');
    $user = $_SESSION['username'];
    $query = "SELECT * FROM tbl_request WHERE username ='$user' " or die("Error:" . mysqli_error($conn));
    $result = mysqli_query($conn, $query);
    $row_r = mysqli_fetch_assoc($result);

    ?>

    <?php if (isset($row_r['request_id'])) { ?>

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
                            <td><?php echo $row_r['request_id']; ?></td>
                            <td><?php echo $row_r['username']; ?></td>
                            <td><?php echo $row_r['firstname']; ?> <?php echo $row_r['lastname']; ?></td>
                            <td><?php echo $row_r['num']; ?></td>
                            <?php if (empty($row_r['request']) && empty($row_r['payment']) && empty($row_r['me_certificate'])) { ?>
                                <td>
                                    <i class="x icon"></i>

                                </td>
                                <td><i class="x icon"></i></td>
                                <td><i class="x icon"></i></td>
                                <td>
                                    <center>
                                        <a href="upload_file.php?act=edit&ID=<?php echo $row_r['request_id']; ?> class=" buttonn">
                                            <button class="ui green button">
                                                <i class="cloud upload icon"></i>
                                            </button>
                                        </a>

                                        <a href="cancle_request.php?ID=<?php echo $row_r['request_id']; ?>&user=<?php echo $row_r['username']; ?>" onclick="return confirm('คุณต้องการยกเลิกคำขอ?')" class="buttonn">
                                            <button class="ui red button but">
                                                <i class="close icon"></i>
                                            </button>
                                        </a>
                                    </center>


                                </td>
                            <?php } else { ?>
                                <td><a href="myfile1/<?php echo $row_r['request']; ?>" style="color: black;"><i class="check icon"></i></a></td>
                                <td><a href="myfile1/<?php echo $row_r['payment']; ?>" style="color: black;"><i class="check icon"></i></a></td>
                                <td><a href="myfile1/<?php echo $row_r['me_certificate']; ?>" style="color: black;"><i class="check icon"></i></a></td>
                                <td>
                                    <center>
                                        <a href="cancle_request.php?ID=<?php echo $row_r['request_id']; ?>&user=<?php echo $row_r['username']; ?>" onclick="return confirm('คุณต้องการยกเลิกคำขอ?')" class="buttonn">
                                            <font color='red'>รอดำเนินการ</font>
                                        </a>
                                    </center>


                                </td>
                            <?php } ?>






                        </tr>
                    <?php } while ($row_r = mysqli_fetch_assoc($result)); ?>
                </tbody>

            </table>
        </div>

        </table>

    <?php } else { ?>
        <br>
        <h4>
            <center>ไม่พบคำขอ</center>
        </h4>

    <?php } ?>






</body>


</html>