<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css\semantic.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master\semantic.min.css">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>
</head>

<body>
<div class="ui secondary  menu">
    <a class="item1">
      <img class="logo" src="image\TIPS-logo-Blue.png">
    </a>
    <a class="item">
      ข้อมูลพนักงาน
    </a>
    <a class="item">
      ประวัติการทำรายการ
    </a>
    <a class="item">
      รายงานการใช้สวัสดิการ
    </a>
    <a class="item">
      ทำเอกสารขอใช้สวัสดิการ
    </a>
    <div class="right menu" style="margin-top: 5px;">
      <div class="ui icon input">
      <img class="ui avatar image" src="image\2.jpg"style="
    margin-right: 4.5;
    margin-right: 10px;
    margin-bottom: 16px;
    margin-top: 2px;">
<span style="margin-top: 8px;">    
<div class="ui simple dropdown item"style="padding-top: 0px;padding-left: 5px;">
      นินิว ฟินฟิน <i class="dropdown icon"><br></i>
      <div class="menu">
      <a class="item">logout</a>
      </div>
      </div></span>
      </div>
    </div>
  </div>
  <div class="ui breadcrumb" style="
    padding-left: 10px;">
  <div class="active section"><a href="http://localhost/%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A%E0%B8%AA%E0%B8%A7%E0%B8%B1%E0%B8%AA%E0%B8%94%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3/login.php">หน้าหลัก</a></div>
  <i class="right angle icon divider"></i>
  <div class="active section"><a href="http://localhost/%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A%E0%B8%AA%E0%B8%A7%E0%B8%B1%E0%B8%AA%E0%B8%94%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3/profile.php#">ข้อมูลพนักงาน</a></div>
  <i class="right angle icon divider"></i>
  <div class="active section">ทำเอกสารขอใช้สวัสดิการ</a></div>
</div>
<br>
<div class="card" style="width:100 rem;padding-top: 1px;width: 600px;height: 600px;margin-left: 400px;margin-right: 400px;border-top-width: 0px;border-right-width: 0px;border-left-width: 0px;border-bottom-width: 0px;">
<form class="ui form">
<div class="ui form"><br>
  <div class="field">
  <label>ประเภทสวัสดิการ</label>
    <select>
      <option value="">เลือกประเภทสวัสดิการ</option>
      <option value="1">สวัสดิการทั่วไป</option>
      <option value="0">ทันตกรรม</option>
    </select>
  </div><br>
</div>
  <div class="field">
    <label>วันที่ได้รับการรักษา</label>
    <input type="text" name="first-name" placeholder="วว/ดด/ปปปป">
  </div><br>
  <div class="field">
    <label>ค่ารักษาพยาบาล</label>
    <input type="text" name="last-name" placeholder="จำนวนเต็มเท่านั้น">
  </div><br>
  <div class="field">
    <label>วันที่ขอเบิกสวัสดิการ</label>
    <input type="text" name="last-name" placeholder="วว/ดด/ปปปป">
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



<form action="/action_page.php">
  <input type="file" id="myfile" name="myfile"style="
    border-bottom-width: 0px;"><br>
  <input type="file" id="myfile" name="myfile"style="
    border-top-width: 0px;"><br><br>
</form>

  </div>
  <form class="ui form">
  <div class="field">
    <label>หมายเหตุ</label>
    <input type="text" name="first-name" placeholder="อธิบายเพิ่มเติม">
  </div><br>
  <center>
  <button class="ui primary button">
  Send
</button>
<button class="ui button">
  Clear
</button>
<button class="ui red button">
  Back
</button>
</form>
</div>
</center>
</body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="ui  message"style="
    padding-left: 50px;
    padding-right: 50px;">
  <div class="header">
    ติดต่อสอบถาม
  </div><br>
  <p class="text-capitalize">ที่อยู่ ท่าเรือแหลมฉบัง ตำบลทุ่งสุขลา อำเภอศรีราชา จังหวัดชลบุรี20230</p>
        <p class="text-capitalize">โทรศัพท์ 0-3840-8400 แฟกซ์ 0-3840-8444</p>
        <p class="text-capitalize">อีเมล tips@tips.co.th เว็บไซต์ http://www.tips.co.th</p>
</div>
</html>