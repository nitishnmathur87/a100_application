<?php
require_once "database.php";
include "debug.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search User by First Name</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
            <h3 class="alert-info">Search Apprentice by Email </h3>
            <div class="table-condensed table-striped display">
                <?php
                $data = array();
                $email = "";

                if (isset($_GET['email_address'])) {
                    $email = filter_input(INPUT_GET, 'email_address');
                    $stmt = $db->prepare('SELECT * FROM apprentice where email_address = ?');
                    $stmt->bindValue(1, $email);
                    $stmt->execute();
                    $rows = $stmt->rowCount();
                    echo "Search result: " . $rows . " rows affected";
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                if (empty($data)) {
                    echo "<tr>";
                    echo "<td colspan='4'>There were no email address</td>";
                    echo "</tr>";
                } else {
                    echo "<html><head><title><h1>Search Apprentice By Email: </h1></title></head></html>";
                    echo "<table border='1' background='blue'>";
                    echo "<tr>";
                    echo "<th>" . "Email Address" . "</th>";
                    echo "<th>" . "First Name" . "</th>";
                    echo "<th>" . "Last Name" . "</th>";
                    echo "<tr>";
                    foreach ($data as $d) {
                        echo "<tr>";
                        echo "<td>" . $d['email_address'] . "</td>";
                        echo "<td>" . $d['first_name'] . "</td>";
                        echo "<td>" . $d['last_name'] . "</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
                echo "</br>" . "</br>";
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