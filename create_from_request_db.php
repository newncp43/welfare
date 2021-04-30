<?php
session_start();
include('server.php');

if (isset($_POST['create'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $type_position = mysqli_real_escape_string($conn, $_POST['type_position']);
    $datetime = mysqli_real_escape_string($conn, $_POST['datetime']);
    $datehot = mysqli_real_escape_string($conn, $_POST['datehot']);
    $money = mysqli_real_escape_string($conn, $_POST['money']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);
    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf([
        'default_font_size' => 16,
        'default_font' => 'sarabun'
    ]);

    $html = '
    <div>
        <img style="width: 200px; height: 40px; " src="image\TIPS-logo-Blue.png">
        <h3>บริษัท ที ไอ พี เอส จำกัด</h3>
        <label>ที่อยู่ (ท่าเรือแหลมฉบัง-ท่าบี 4)ท่าเรือแหลมฉบัง (ท่าบี 4)
        ตำบลทุ่งสุขลา อำเภอศรีราชา จังหวัดชลบุรี 20230</label>
    </div>
    <br>
    <div style="text-align:center"><h3>ใบเบิกเงินค่ารักษา</h3></div>
    <div>
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ข้าพเจ้า&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ' . $firstname . '</label> <label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ' . $lastname . '
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </label>
        <label>ตำแหน่ง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ' . $type_position . '</label>
    </div>
    <br>
    <div>
        <label>
        ประเภทขอเบิกค่ารักษา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
        ' . $type . '
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        วันที่ขอเบิกสวัสดิการ&nbsp;&nbsp;ปี/เดือน/วัน&nbsp;&nbsp;&nbsp;&nbsp;  
        ' . $datetime . '
        </label>
    </div>
    <br>
    <div>
        <label>
        วันที่ได้รับการรักษา&nbsp;&nbsp;ปี/เดือน/วัน&nbsp;&nbsp;&nbsp;&nbsp;  
        ' . $datehot . '
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
        จำนวนเงินที่ขอเบิก&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
        ' . $money . '&nbsp;&nbsp;บาท
        </label>
    </div>
    <br>
    <div>
        <label>
        เหตุผลอธิบายเพิ่มเติม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
        ' . $detail . '
        </label>
        
    </div>
    <br>
    <br>
    <br>
    <div><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    ลงชื่อ <label>
    &nbsp;&nbsp;&nbsp;&nbsp;  
    ' . $firstname . '&nbsp;&nbsp;' . $lastname . '
     </label></h4>
     
    </div>

    ';
    $user = $_SESSION['username'];
    $query = "SELECT * FROM tbl_data_employees WHERE username ='$user' " or die("Error:" . mysqli_error($conn));
    $result = mysqli_query($conn, $query);
    $row_am = mysqli_fetch_array($result);


    if ($row_am['limits'] >= $money) {

        $total = $row_am['limits'] - $money;

        $sql = "UPDATE tbl_data_employees SET limits='$total' WHERE username = '$username' ";
        $result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));

        $sql1 = "INSERT INTO tbl_request (username, firstname, lastname, num) 
            VALUES('$username','$firstname','$lastname','$money')";

        $result1 = mysqli_query($conn, $sql1) or die("Error in query: $sql1 " . mysqli_error($conn));

        mysqli_close($conn);
        // javascript แสดงการ upload file

        if ($result1) {
            echo "<script type='text/javascript'>";
            echo "alert('Succesfuly');";
            echo "</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "alert('Error back to upload again');";
            echo "</script>";
        }
        $mpdf->writeHtml($html);
        $mpdf->Output();
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('วงเงินของคุณไม่พอสำหรับการเบิก');";
        echo "window.location = 'create_from_request.php'; ";
        echo "</script>";
    }
}
