<?php
include "debug.php";
require_once "database.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search By City</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/form.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
             <h3 class="alert-info">Search Apprentices By City</h3>
            <div class="table-condensed table-striped">
                <?php
                $data = array();
                $city = "";
                if (isset($_GET['city'])) {
                    $city = filter_input(INPUT_GET, 'city');
                    $stmt = $db->prepare("SELECT * FROM apprentice WHERE city=?");
                    $stmt->bindValue(1, $city);
                    $stmt->execute();
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                if (empty($data)) {
                    echo "<tr>";
                    echo "<td colspan='4'>No records</td>";
                    echo "</tr>";
                } else {
                    echo "<table border='1' background='blue'>";
                    echo "<tr>";
                    echo "<th>" . "City Name" . "</th>";
                    echo "<th>" . "First Name" . "</th>";
                    echo "<th>" . "Last Name" . "</th>";
                    echo "<th>" . "Email Address" . "</th>";
                    echo "</tr>";
                    foreach ($data as $d) {
                        echo "<tr>";
                        echo "<td >" . $d['city'] . "</td>";
                        echo "<td>" . $d['first_name'] . "</td>";
                        echo "<td>" . $d['last_name'] . "</td>";
                        echo "<td>" . $d['email_address'] . "</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
                echo "</br>" . "</br>"
                ?>   
            </div>
        </div>
        <div>
            <?php
            include "lookup_forms.php";
            ?>
        </div>
    </body>
</html>