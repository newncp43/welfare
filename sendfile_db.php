<?php
session_start();
include('server.php');

if (isset($_POST['sendfile'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf([
        'default_font_size' => 16,
        'default_font' => 'sarabun'
    ]);

    $html = '
    <img style="width: 200px; height: 40px; " src="image\TIPS-logo-Blue.png"><br>
    <div style="text-align:center"><h3>ใบเบิกเงินค่ารักษา</h3></div>
    <div><label>ข้าพเจ้า    ' . $firstname . '</label> <label>   ' . $lastname . '</label></div>
    ';
    $mpdf->writeHtml($html);

    $mpdf->Output();
}
