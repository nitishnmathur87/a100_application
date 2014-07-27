<!DOCTYPE html>
<html>
    <head>
        <title>Search User by First Name</title>
        <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
<?php
require_once 'utility/config.php';
include "utility/debug.php";
    $data = array();
    $fname = "";
    if (isset($_GET['first_name'])) 
  //  if(isset(filter_input(INPUT_GET, 'first_name')))  //not working this way??
   {
        $fname = filter_input(INPUT_GET, 'first_name');
        $stmt = $link->prepare("SELECT * FROM register WHERE first_name=?");
        $stmt->bindValue(1, $fname);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    if (empty($data)) {
        echo "<tr>";
        echo "<td colspan='4'>There were not records</td>";
        echo "</tr>";
    } else {
        //print_r($data);
        echo "<html><head><title><h1>User Search Information</h1></title></head></html>";
        echo "<table border='1' color='blue'>";
        foreach ($data as $d) {
            echo "<tr>";
            echo "<td width='65' height='25'>" . $d['id'] . "</td>";
            echo "<td width='165' height='25'>" . $d['first_name'] . "</td>";
            echo "<td width='165' height='25'>" . $d['last_name'] . "</td>";
            echo "<td width='250' height='25'>" . $d['email_address'] . "</td>";
            echo "<td width='100' height='25'>" . $d['password'] . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
echo <<<_END
<form>
 <form action="first_name_serach.php" method="GET">
Enter first name to search for this user's record:<br> 
    <input type="text" name="first_name" id="first_name">
_END;
?>
<input type="submit" name="action"  value="first name search">
</form>
</body>
</html>