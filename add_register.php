<?php
session_start();
include('server.php');
if ($_SESSION['userlevel'] != 'admin') {
  header('location: login.php');
}

$sql = "SELECT * FROM tbl_position ORDER BY pos_id asc " or die("Error:" . mysqli_error($conn));
$result = mysqli_query($conn, $sql);




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

  <title>Add register</title>

</head>

<body>
  <div class="ui secondary  menu">
    <a class="item1">
      <img class="logo" src="image\TIPS-logo-Blue.png">
    </a>
    <div class="ui simple dropdown item">
      พนักงาน <i class="dropdown icon"><br></i>
      <div class="menu">
        <a class="item" href="add_register.php">ลงทะเบียนพนักงาน</a>
        <a class="item">ข้อมูลพนักงาน</a>
      </div>
    </div>

    <div class="right menu" style="margin-top: 5px;">
      <div class="ui icon input">
        <input type="text" placeholder="Search..." style="height: 37px; border-radius: 2000px;">
        <i class="inverted circular search link icon"></i>
      </div>
    </div>
    <a class="ui item">
      ออกจากระบบ
    </a>
  </div>


  <form class="ui form" action="add_register_db.php" method="post">

    <center>
      <div class="input-group" id="choose">
        <img class="ui medium image" src="image\2.jpg" style="width: 150px;">

        <br>
        <div class="container">

          <div class="ui form">
            <div class="two fields">
              <div class="input-group field">
                <label for="firstname">First Name</label>
                <input type="text" placeholder="First name" name="firstname">
              </div>
              <div class="input-group field">
                <label for="lastname">Last Name</label>
                <input type="text" placeholder="Last name" name="lastname">
              </div>
            </div>
          </div>


          <label for="position" style="font-weight: bold;">Position</label>
          <select name="pos_id" id="pos_id" placeholder="Position">
            <option value="pos_id">Position</option>
            <?php foreach ($result as $results) { ?>
              <option value="<?php echo $results["limit"]; ?>">
                <?php echo $results["type_position"]; ?> 
              </option>

            <?php } ?>

          </select>






          <div class="input-group field"><br>
            <label for="username">Username</label>
            <input type="text" placeholder="Username" name="username">
          </div>
          <div class="input-group field">
            <label for="password">Password</label>
            <input type="text" placeholder="Password" name="password">
          </div>

          <div class="input-group field">
            <label for="password1">Confirm password</label>
            <input type="text" placeholder="Confirm password" name="password1">
          </div>


          <div><br>
            <button type="submit" name="emp_add" class="ui active input button">
              <i class="save icon"></i>
              save
            </button>
          </div>
    </center>
  </form>

</body>

</html>