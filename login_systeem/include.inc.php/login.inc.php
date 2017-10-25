<?php

session_start();

if (isset($_POST['submit'] )) {
  echo var_dump($_POST);

  include '../include/dbh.inc.php';
  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
  //Error handlers
  if (empty($uid) || empty($password)) {
    header("location: ../index.php?login=empty");
    exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE user_uid='".$uid."' OR user_email='".$uid."';";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);

    if ($resultcheck < 1) {
      header("location: ../index.php?login=error1");
      exit();
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        //de-hashing the password
        $hashedpasswordcheck = password_verify($password, $row['user_password']);

        if ($hashedpasswordcheck == false) {
          header("location: ../index.php?login=error2");
          exit();
        }
        else if ($hashedpasswordcheck == true) {
            $session ['u_id'] = $row['user_id'];
            $session ['u_first'] = $row['user_first'];
            $session ['u_last'] = $row['user_last'];
            $session ['u_email'] = $row['user_email'];
            $session ['u_uid'] = $row['user_id'];
            header("location: ../index.php?login=succes");
            exit();

        }
      }
    }  # code...
  }
}
  else {
    header("location: ../index.php?login=error3");
    exit();
  }
