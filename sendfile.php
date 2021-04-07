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
      <form class="ui form" action="sendfile_db.php" method="post">
        <input type="hidden" name="firstname" value="<?php echo $row_am['firstname']; ?>">
        <input type="hidden" name="lastname" value="<?php echo $row_am['lastname']; ?>">
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
          <input type="date" name="last-name" placeholder="วว/ดด/ปปปป">
        </div><br>
        <div class="field">
          <label>วันที่ได้รับการรักษา</label>
          <input type="date" name="first-name" placeholder="วว/ดด/ปปปป">
        </div><br>
        <div class="field">
          <label>ค่ารักษาพยาบาล</label>
          <input type="text" name="last-name" placeholder="จำนวนเต็มเท่านั้น">
        </div><br>
        <div class="field">
          <label>เอกสารแนบ</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              ใบเสร็จจ่ายเงิน
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
              ใบรับรองแพทย์
            </label>
          </div>
          <br>


          <input type="file" id="myfile" name="myfile" style="
    border-bottom-width: 0px;"><br>
          <input type="file" id="myfile" name="myfile" style="
    border-top-width: 0px;"><br><br>

        </div>


        <div class="field">
          <label>หมายเหตุ</label>
          <input type="text" name="first-name" placeholder="อธิบายเพิ่มเติม">
        </div><br>

        <button class="ui primary button" name="sendfile">
          Send
        </button>


      </form>
    </div>
    </div>
  </center>





</body>


</html>