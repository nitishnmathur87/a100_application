<?php
    session_start();
?>
<html>
    <head>
         <meta charset="UTF-8">
<!--        <link rel="stylesheet" href="CSS/index.css">-->
    <body>
        <form action="register_validation.php" method="post"><pre>
            <div>
              <?php
                            if (isset($_SESSION['reg'])) {
                                $first_name = $_SESSION['data']['first_name'];
                                $last_name = $_SESSION['data']['last_name'];
                                $email_address = $_SESSION['data']['email_address'];
                                $password = $_SESSION['data']['password'];
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['reg']['done'])) {
                                echo '<font color="green">' . $_SESSION['reg']['done'] . '</font>';
                            }
                  ?>
            </div>
            <fieldset>
                <legend>Register</legend>
                    <label class='lbl'  for="first_name">First Name: </label>
                    <input type="text" class="input" name="first_name" value="<?php echo $first_name="" ?>">
                    <?php
                    if (isset($_SESSION['reg']['first_name'])) {
                        echo '<font color="red">' . $_SESSION['reg']['first_name'] . '</font>' ;
                    }
                    ?>
                    <label for="last_name">Last Name: </label>
                    <input type="text" class="input" name="last_name" value="<?php echo $last_name="" ?>">
                    <?php
                    if (isset($_SESSION['reg']['last_name'])) {
                        echo '<font color="red">' . $_SESSION['reg']['last_name'] . '</font>';
                    }
                    ?>
                    <label for="email_address">email address: </label>
                    <input type="text" name="email_address" class="input" value="<?php echo $email_address="" ?>">
                    <?php 
                     if (isset($_SESSION['reg']['email_address'])) {
                         echo '<font color="red">' . $_SESSION['reg']['email_address'] . '</font>';
                     }
                    ?>
                    <label for="password">password: </label>
                    <input type="password" name="password" class="input">
                    <?php
                    if (isset($_SESSION['reg']['password'])){
                        echo '<font color="red">' . $_SESSION['reg']['password'] . '</font>'; 
                    }
                    ?>
                    <label id="re_enter">Confirm Password: </label>
                    <input type="password" name="re_enter" class="input">
                    <?php
                    if (isset($_SESSION['reg']['re_enter'])){
                        echo '<font color="red">' . $_SESSION['reg']['re_enter']  . '</font>';
                    }
                    ?>
                    
                    <input type="submit"  value="Submit">
                    <?php unset($_SESSION['reg']); ?>
            </fieldset>
       </pre> </form>
      </body>
    </head>
</html>
  
