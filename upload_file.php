<?php
session_start();
include('server.php');
$ID = $_GET["ID"];
$sql = "SELECT * FROM tbl_request  WHERE request_id='$ID' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
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
    <title>รายการคำขอ</title>


</head>

<body>
    <?php include('navEmployee.php');

    ?>


    <br>

    <form class="ui form" action="upload_file_db.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="request_id" value="<?php echo $row['request_id']; ?>">
        <center>
            <div class="container">
                <div class="field">
                    <label class="form-check-label" for="flexCheckDefault">
                        เอกสารคำขอ
                    </label><br>
                    <input type="file" id="myfile1" name="myfile1"><br><br>

                    <label class="form-check-label" for="flexCheckDefault">
                        ใบเสร็จจ่ายเงิน
                    </label><br>
                    <input type="file" id="myfile2" name="myfile2"><br><br>
                    <label class="form-check-label" for="flexCheckChecked">
                        ใบรับรองแพทย์
                    </label><br>
                    <input type="file" id="myfile3" name="myfile3"><br><br>

                </div>
                <button type="submit" class="ui active input button" style="background-color: #002d56; color: white">
                    <i class="cloud upload icon"></i>
                    upload
                </button>
            </div>
        </center>

    </form>



</body>


</html>