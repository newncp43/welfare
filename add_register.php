<?php
session_start();
include('server.php');


$sql = "SELECT * FROM tbl_position ORDER BY pos_id asc " or die("Error:" . mysqli_error($conn));
$result1 = mysqli_query($conn, $sql);




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

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>



  <title>Add register</title>

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
  }

  ?>
  <?php include('navAdmin.php'); ?>




  <form class="ui form" action="add_register_db.php" method="post">

    <center>
      <div class="input-group" id="choose">
        <img class="ui medium image" src="image\avatar.png" style="width: 150px;">

        <br>
        <div class="container">
          <?php if (isset($_SESSION['errors'])) : ?>
            <div class="success">
              <h4 style="color: red;">
                <?php
                echo $_SESSION['errors'];
                unset($_SESSION['errors']);
                ?>
              </h4>
            </div>
          <?php endif ?>
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
              <div class="input-group field">
                <label for="lastname">Phone Number</label>
                <input type="text" placeholder="Phone Number" name="phonenumber">
              </div>
            </div>
          </div>


          <label for="position" style="font-weight: bold;">Position</label>
          <select name="type_position" id="type_position" placeholder="Position">

            <?php foreach ($result1 as $results) { ?>
              <option value="<?php echo $results["type_position"]; ?>">
                <?php echo $results["type_position"]; ?>
              </option>

            <?php } ?>

          </select>
          <br>

          <label for="position" style="font-weight: bold;">Limit</label>
          <select name="limit" id="limit" placeholder="Limit">

            <?php foreach ($result1 as $results) { ?>
              <option value="<?php echo $results["limit"]; ?>">
                <?php echo $results["limit"]; ?>/year
              </option>

            <?php } ?>

          </select>






          <div class="input-group field"><br>
            <label for="username">Username</label>
            <input type="text" placeholder="Username" name="username">
          </div>
          <div class="input-group field">
            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password_1">
          </div>

          <div class="input-group field">
            <label for="password1">Confirm password</label>
            <input type="password" placeholder="Confirm password" name="password_2">
          </div>


          <div><br>
            <button type="submit" name="emp_add" class="ui active input button" style="background-color: #002d56; color: white">
              <i class="save icon"></i>
              save
            </button>
          </div>
    </center>
  </form>

</body>

</html>