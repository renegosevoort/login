<?php

if (isset($_POST['submit'])){

  include_once 'dbh.inc.php';

  $first = myqsli_real_escape_string($conn, $_POST ['first']);
  $last = myqsli_real_escape_string($conn, $_POST ['last']);
  $email = myqsli_real_escape_string($conn, $_POST ['email']);
  $uid = myqsli_real_escape_string($conn, $_POST ['uid']);
  $password = myqsli_real_escape_string($conn, $_POST ['password']);

  //Error handlers
  //Check for empty fields

if (empty($first) || empty($last)  ||empty($email) || empty($uid) || empty($password)) {
  header("Location: ../signup.php?signup=empty");
  exit();
  # code...
}
else {
  //check if character are valid
  if ( !preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
    header("Location: ../signup.php?signup=invalid");
    exit();
  }
}
else {
  //Check if email is valid
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?signup=email");
    exit();
  }
else {
  $sql = "SELECT * FROM users WHERE user_uid ='user_uid'";
  $result = mysqli_query($conn, $sql);
  $resultcheck = mysqli_num_rows($result);
  if ($resultcheck > 0)
  header("Location: ../signup.php?signup=usertaken");
  exit();
  else (
    //hashed the password
    $hashedpassword =  password_hash($password, PASSWORD_DEFAULT);
    //Insert user into database
    $sql = "INSERT INTO user(user_first, user_last, user_email, user_uid, user_password) VALUES ('$first','$last','$email','$uid','$hashedpassword');";
    myqsli_query($conn, $sql);
    header("Location: ../signup.php?signup=succes");
    exit();
    )
}

else {
  header("Location: ../signup.php");
  exit();
}
