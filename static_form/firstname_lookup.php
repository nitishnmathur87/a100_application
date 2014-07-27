<?php
include "debug.php";
require_once "database.php";
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
        <link href="csss/form.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
             <h3 class="alert-info">Search Apprentice By First Name</h3>
            <div class="table-striped display table-hover table-responsive">
                <?php
                $data = array();
                $fname = "";
                if (isset($_GET['first_name'])) {
                    $fname = filter_input(INPUT_GET, 'first_name');
                    // $data = searchByFirstName($fname);
                    $stmt = $db->prepare("SELECT * FROM apprentice WHERE first_name=?");
                    $stmt->bindValue(1, $fname);
                    $stmt->execute();
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                if (empty($data)) {
                    echo "<tr>";
                    echo "<td colspan='4'>There were not records</td>";
                    echo "</tr>";
                } else {
                    echo "<html><head><title><h1>User Search Information</h1></title></head></html>";
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>" . "First Name" . "</th>";
                    echo "<th>" . "Last Name" . "</th>";
                    echo "<th>" . "Email Address" . "</th>";
                    echo "<tr>";
                    foreach ($data as $d) {
                        echo "<tr>";
                        echo "<td>" . $d['first_name'] . "</td>";
                        echo "<td>" . $d['last_name'] . "</td>";
                        echo "<td>" . $d['email_address'] . "</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
                echo "</br>" . "<br>";
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