<?php

error_reporting(E_ALL);

var_dump($_POST);

if (isset($_POST['submit'])){

  include_once 'dbh.inc.php';

  $first = mysqli_real_escape_string($conn, $_POST ['first']);
  $last = mysqli_real_escape_string($conn, $_POST ['last']);
  $email = mysqli_real_escape_string($conn, $_POST ['email']);
  $uid = mysqli_real_escape_string($conn, $_POST ['uid']);
  $password = mysqli_real_escape_string($conn, $_POST ['password']);

  //Error handlers
  //Check for empty fields

if (empty($first) || empty($last)  ||empty($email) || empty($uid) || empty($password)) {
  header("Location: ../signup.php?signup=empty");
  exit();
  # code...
}
else if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last))  {
  //check if character are valid
    header("Location: ../signup.php?signup=invalid");
    exit();

}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //Check if email is valid

    header("Location: ../signup.php?signup=email");
    exit();
  }
else {
  $sql = "SELECT * FROM users WHERE user_uid ='user_uid'";
  $result = mysqli_query($conn, $sql);
  $resultcheck = mysqli_num_rows($result);
  if ($resultcheck > 0){
  header("Location: ../signup.php?signup=usertaken");
  exit();
}
  else {
    //hashed the password
    $hashedpassword =  password_hash($password, PASSWORD_DEFAULT);
    //Insert user into database
    $sql = "INSERT INTO users(user_first, user_last, user_email, user_uid, user_password) VALUES ('$first','$last','$email','$uid','$hashedpassword');";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("Location: ../signup.php?signup=succes");
    exit();
  }
}
}

else {
  header("Location: ../signup.php");
  exit();
}
