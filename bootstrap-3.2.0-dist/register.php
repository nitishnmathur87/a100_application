<?php
    session_start();
?>
<html>
    <head>
         <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <title>A100 Apprentice Registration Form</title>
</head>
<!--        <link rel="stylesheet" href="CSS/index.css">-->
    <body>
        <h1 class="col-md-12">
        A100 Apprentice Registration Form
    </h1>
        <form class="form-horizontal" role="form" id="reg" action="register_validation.php" method="post">
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
            
            <fieldset class="col-md-12 well">
                <legend  class="scheduler-border">Register</legend>
                <div class="form-group">
                    <label  class="col-md-4 control-label" for="first_name">First Name</label>
                    <div class="col-md-8">
                        <input type="text" class="input" name="first_name" value="<?php echo $first_name="" ?>">
                        <?php
                        if (isset($_SESSION['reg']['first_name'])) 
                        {
                            echo '<font color="red">' . $_SESSION['reg']['first_name'] . '</font>' ;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="last_name">Last Name</label>
                    <div class="col-md-8">
                        <input type="text" class="input" name="last_name" value="<?php echo $last_name="" ?>">
                        <?php
                        if (isset($_SESSION['reg']['last_name'])) {
                        echo '<font color="red">' . $_SESSION['reg']['last_name'] . '</font>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email_address">Email Address</label>
                    <div class="col-md-8">
                        <input type="text" name="email_address" class="input" value="<?php echo $email_address="" ?>">
                        <?php 
                         if (isset($_SESSION['reg']['email_address'])) {
                         echo '<font color="red">' . $_SESSION['reg']['email_address'] . '</font>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password">Password</label>
                    <div class="col-md-8">
                        <input type="password" name="password" class="input">
                        <?php
                        if (isset($_SESSION['reg']['password'])){
                        echo '<font color="red">' . $_SESSION['reg']['password'] . '</font>'; 
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" id="re_enter">Confirm Password</label>
                    <div class="col-md-8">
                        <input type="password" name="re_enter" class="input">
                        <?php
                        if (isset($_SESSION['reg']['re_enter'])){
                        echo '<font color="red">' . $_SESSION['reg']['re_enter']  . '</font>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12" style="text-align:center;">
                        <input type="submit" value="Submit">
                        <?php unset($_SESSION['reg']); ?>
                    </div>
                </div>
            </fieldset>
       </form>
      </body>
    </head>
</html>
  
