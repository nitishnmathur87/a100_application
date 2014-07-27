<?php
    session_start();
    $link = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root', 'root');
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    
    
    
?>
<html>
    <head>
         <meta charset="UTF-8">
<!--        <link rel="stylesheet" href="CSS/index.css">-->
    <body>
        <form action="register_validation.php" method="post"><pre>
            
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
            
            <fieldset>
                <legend>Register</legend>
                    <label class='lbl'  for="first_name">First Name </label>
                    <input type="text" class="input" name="first_name" value="<?php echo $first_name ?>">
                    <?php
                    if (isset($_SESSION['reg']['first_name'])) {
                        echo '<font color="red">' . $_SESSION['reg']['first_name'] . '</font>' ;
                    }
                    ?>
                    <label for="last_name">Last Name </label>
                    <input type="text" class="input" name="last_name" value="<?php echo $last_name ?>">
                    <?php
                    if (isset($_SESSION['reg']['last_name'])) {
                        echo '<font color="red">' . $_SESSION['reg']['last_name'] . '</font>';
                    }
                    ?>
                    <label for="email_address">Email address </label>
                    <input type="text" name="email_address" class="input" value="<?php echo $email_address ?>">
                    <?php 
                     if (isset($_SESSION['reg']['email_address'])) {
                         echo '<font color="red">' . $_SESSION['reg']['email_address'] . '</font>';
                     }
                    ?>
                    <label for="password">Password: </label>
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
                        echo '<font color="red">' . $SESSION['reg']['re_enter']  . '</font>';
                    }
                    ?>
                    Gender:
                   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
                   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
                    <?php
                    if (isset($_SESSION['reg']['gender'])) {
                        echo '<font color="red">' . $_SESSION['reg']['gender'] . '</font>';
                    }
                    ?>
                    <label id="institution_id">What is the name of your university?</label>
                 
                                    <select name="institution_id">
                                         <?php
                                         try {
                                                   $stmt=$link->prepare("SELECT * FROM institution");
                                                   $stmt->execute();
                                                   $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                          }catch (PDOException $e){
                                             echo "error" . $e->getMessage();
                                          }  
                                         if(empty($data)) {
                                                 echo "There were no records.";
                                          }
                                          ?>
                                        <?php foreach($data as $row) : ?>
                                               <option value= "<?php echo $row['id'];?>"<?php if($option==$row['id']) $selected="selected" ?>>
                                               <?php echo $row['institution_name']; ?> </option>
                                        <?php endforeach; ?>  
                                     </select>
                                     <?php
                    if (isset($_SESSION['reg']['id'])) {
                        echo '<font color="red">' . $_SESSION['reg']['instit'] . '</font>';
                    }
                    ?>	
                    
                    <input type="submit"  value="Submit">
                    <?php unset($_SESSION['reg']); ?>
            </fieldset>
       </pre> </form>
      </body>
</html>
  
