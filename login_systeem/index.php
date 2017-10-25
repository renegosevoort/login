<?php
 include_once '../header.php'
 ?>
       <section class="main-containter">
         <div class="main-wrapper">
           <h2>Home</h2>
           <p>Test</p>
    <?php
      if (isset($_session['u_id'])){
        echo "Your are logged in succesfully";
      }
    ?>


       </section>
<?php
include_once '../footer.php'
?>
