<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['emp_add'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $type_position = mysqli_real_escape_string($conn, $_POST['type_position']);
    $limit = mysqli_real_escape_string($conn, $_POST['limit']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    if (empty($firstname)) {
        array_push($errors, "Firstname is required");
    }
    if (empty($lastname)) {
        array_push($errors, "Lastname is required");
    }
    if (empty($type_position)) {
        array_push($errors, "Position is required");
    }
    if (empty($limit)) {
        array_push($errors, "Limit is required");
    }
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match ");
    }

    $user_check_query = "SELECT * FROM tbl_user WHERE username = '$username' ";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        if ($result['username'] === $username) {
            array_push($errors, "Username already exists");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password_1);

        $sql1 = "INSERT INTO tbl_data_employees (firstname, lastname, type_position, limits, username,password) VALUES ('$firstname', '$lastname', '$type_position', '$limit', '$username','$password')";
        mysqli_query($conn, $sql1);

        $sql2 = "INSERT INTO tbl_user (username, password, userlevel) VALUES ('$username', '$password', 'employee')";
        mysqli_query($conn, $sql2);

        $_SESSION['username'] = $username;
        echo "<script type='text/javascript'>";
        echo "alert('Succesfuly');";
        echo "window.location = 'add_register.php'; ";
        echo "</script>";
    } else {
        array_push($errors, "Username already exists");
        $_SESSION['errors'] = "Username already exists";
        header("location: add_register.php");
    }
}
