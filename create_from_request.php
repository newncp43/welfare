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
  <title>ฟอร์มยื่นคำขอร้อง</title>

</head>

<body>
  <?php include('navEmployee.php'); ?>



  <br>
  <center>
    <div class="card">
      <form class="ui form" action="create_from_request_db.php" method="post">
        <input type="hidden" name="firstname" value="<?php echo $row_am['firstname']; ?>">
        <input type="hidden" name="lastname" value="<?php echo $row_am['lastname']; ?>">
        <input type="hidden" name="username" value="<?php echo $row_am['username']; ?>">
        <input type="hidden" name="type_position" value="<?php echo $row_am['type_position']; ?>">
        <div class="ui form"><br>
          <div class="field">
            <label>ประเภทสวัสดิการ</label>
            <select name="type">
              <option value="0">เลือกประเภทสวัสดิการ</option>
              <option value="เจ็บป่วยทั่วไป">เจ็บป่วยทั่วไป</option>
              <option value="อุบัติเหตุ">อุบัติเหตุ</option>
              <option value="ทันตกรรม">ทันตกรรม</option>
            </select>
          </div><br>
        </div>
        <div class="field">
          <label>วันที่ขอเบิกสวัสดิการ</label>
          <input type="date" name="datetime" placeholder="วว/ดด/ปปปป">
        </div><br>
        <div class="field">
          <label>วันที่ได้รับการรักษา</label>
          <input type="date" name="datehot" placeholder="วว/ดด/ปปปป">
        </div><br>
        <div class="field">
          <label>ค่ารักษาพยาบาล</label>
          <input type="text" name="money" placeholder="จำนวนเต็มเท่านั้น">
        </div><br>


        <div class="field">
          <label>หมายเหตุ</label>
          <input type="text" name="detail" placeholder="อธิบายเพิ่มเติม">
        </div><br>

        <button class="ui primary button" name="create" style="background-color: #002d56">
          สร้าง
        </button>


      </form>
    </div>
    </div>
  </center>





</body>


</html>