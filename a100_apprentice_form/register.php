<?php
    session_start();
    $link = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root', 'root');
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
     try {
         $stmt=$link->prepare("SELECT * FROM institution");
         $stmt->execute();
         $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         }catch (PDOException $e){
               echo "error" . $e->getMessage();
         }  
         if(empty($data)) { echo "There were no records."; }
      
     if (isset($_SESSION['reg'])) {
                                $first_name = $_SESSION['data']['first_name'];
                                $last_name = $_SESSION['data']['last_name'];
                                $email_address = $_SESSION['data']['email_address'];
                                $password = $_SESSION['data']['password'];
                            }
                            
    if (isset($_SESSION['reg']['done'])) {
                                echo '<font color="green">' . $_SESSION['reg']['done'] . '</font>';
                            }
   if (isset($_SESSION['reg']['first_name'])) {
      echo '<font color="red">' . $_SESSION['reg']['first_name'] . '</font>' ;
   }
    if (isset($_SESSION['reg']['last_name'])) {
                        echo '<font color="red">' . $_SESSION['reg']['last_name'] . '</font>';
     }
     if (isset($_SESSION['reg']['email_address'])) {
         echo '<font color="red">' . $_SESSION['reg']['email_address'] . '</font>';
     }
     if (isset($_SESSION['reg']['password'])){
        echo '<font color="red">' . $_SESSION['reg']['password'] . '</font>'; 
     }
     if (isset($_SESSION['reg']['re_enter'])){
           echo '<font color="red">' . $SESSION['reg']['re_enter']  . '</font>';
     }
?>

<html>
    <head>
         <meta charset="UTF-8">
    <body>
        <form action="register_validation.php" method="post">
             <fieldset>
                <legend>Register</legend>
                   First Name 
                    <input type="text" class="input" name="first_name">
                    Last Name 
                    <input type="text" name="last_name" >
                   Email address 
                    <input type="text" name="email_address">
                    Password: 
                    <input type="password" name="password" >
                    
                    <label id="re_enter">Confirm Password: </label>
                    <input type="password" name="re_enter">
                    Gender:
                   <input type="radio" name="gender" value="female">Female
                   <input type="radio" name="gender" value="male">Male
                   What is the name of your university?
                    <select name="institution_id">
                        <?php foreach($data as $row) : ?>
                            <option value= "<?php echo $row['id'];?>"<?php if($option==$row['id']) $selected="selected"; ?>>
                                  <?php echo $row['institution_name']; ?> </option>
                           <?php endforeach; ?>  
                     </select>
                   major <input type="text" name='major'><br>
                   graduation date: <input type="date" name="graduation_date"><br>
                    <input type="submit"  value="Submit">
                    <?php unset($_SESSION['reg']); ?>
            </fieldset>
       </form>
      </body>
</html>
  
