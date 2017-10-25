<?php
  include_once '../header.php';
?>
       <section class="main-containter">
         <div class="main-wrapper">
           <h2>Sign up</h2>
            <form class="signup-form" action="include/signup.inc.php" method="post">
              <input type="text" name="first" placeholder="firstname" required>
              <input type="text" name="last" placeholder="Lastname" required>
              <input type="email" name="email" placeholder="E-mail" required>
              <input type="text" name="uid" placeholder="Username"required>
              <input type="password" name="password" placeholder="Password"required>
              <button type="submit" name="submit">Sign Up</button>
            </form>

       </section>
<?php
  include_once '../footer.php';
?>
