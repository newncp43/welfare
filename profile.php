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

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

  <title>โปรไฟล์ของฉัน</title>
</head>

<body>
  <?php if (@$_GET['do'] == 'success') {
    echo '<script type="text/javascript">
    Swal.fire({
      icon: "success",
      title: "เข้าสู่ระบบสำเร็จ",
      showConfirmButton: false,
      timer: 2000
    })</script>';
  } ?>
  <?php include('navEmployee.php');?>

  <center>
    <img class="ui medium image" src="image\avatar.png" style="width: 150px;">
    <form class="ui form"><br><br>
      <div class="card" style="width:100 rem;padding-top: 1px;width: 600px;height: 600px;margin-left: 400px;margin-right: 400px;border-top-width: 0px;border-right-width: 0px;border-left-width: 0px;border-bottom-width: 0px;">
        <div class="ui form">
          
          <div class="two fields">
            <div class="field">
              <label>First Name</label>
              <input placeholder="<?php echo $row_am['firstname'] ?>" readonly="" type="text" name="name">
              
            </div>
            <div class="field">
              <label>Last Name</label>
              <input placeholder="<?php echo $row_am['lastname'] ?>" readonly="" type="text">
            </div>
          </div>
        </div>
        <div class="ui form">
          <div class="two fields">
            <div class="field">
              <label>ตำแหน่ง</label>
              <input placeholder="<?php echo $row_am['type_position'] ?>" readonly="" type="text">
            </div>
            <div class="field">
              <label>มือถือ</label>
              <input placeholder="<?php echo $row_am['tel'] ?>" readonly="" type="text">
            </div>
          </div>
        </div><br>
        <label>รายละเอียดสวัสดิการ</label>


        <table class="ui table">
          <thead>
            <tr>
              <th class="ten wide">สวัสดิการ</th>
              <th class="six wide">วงเงินที่ใช้ได้</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>อุบัติเหตุ, เจ็บป่วยทั่วไป, ทันตกรรม</td>
              <td><?php echo $row_am['limits'] ?></td>
            </tr>

          </tbody>

        </table>
      </div>
  </center>
</body>


</html>