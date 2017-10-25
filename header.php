<?php
session_start();
 ?>



<!DOCTYPE html>
<html>
  <head>

    <title></title>
    <link rel="stylesheet" type="text/css" href="/style.css">

  </head>
  <body>
     <header>
       <nav>
         <div class="main-wrapper">
           <ul>
           </ul>
           <div class="nav-login">

                     <form action="include.inc.php/logout.inc.php" method="POST">
                     <button type="submit" name="submit">logout</button>
                     </form>

                  <form action="include.inc.php/login.inc.php" method="post">
                       <input type="text" name="uid" placeholder="Username/Email">
                       <input type="password" name="password" placeholder="password">
                       <button type="submit" name="submit">SignUp</button>
                  </form>
                      <a href="signup.php">Sign Up</a>


         </div>
       </nav>
     </header>
