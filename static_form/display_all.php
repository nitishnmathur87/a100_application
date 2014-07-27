<?php
include "debug.php";
require_once "database.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Display All</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
<!--        <link href="css/form.css" rel="stylesheet">-->
        <link href='css/flipscroll_table.css' rel='stylesheet'>
    </head>
    <body>

        <div class="container-fluid">
            <h3 class="alert-info">Display All Apprentices Information</h3>
            <div class="table-responsive display" id='flipscroll' >
                <?php
                echo "<table border='1' class='table' >
            <thead>
                <tr>
                <th>Name </th>
                <th>Email Address</th>
                <th>Institution ID</th>
                <th>Major</th>
                <th>Graduation Date</th>
                <th>Cohort ID</th>
                <th>City</th>
                <th>Zip Code</th>
                <th>Phone</th>
                <th>LinkedIn</th>
                <th>Portfolio</th>
                <th>18 Or Older</th>
                <th>Work Authorization</th>
                <th>Path ID</th>
                <th>Other Path</th>
                <th>Active</th>
                <th>Comments</th>
            </tr> 
      </thead>
      ";
                try {
                    $stmt = $db->prepare("SELECT * FROM apprentice");
                    $stmt->execute();
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($data as $d) {
                        echo "<form action=display_all.php method=post>";
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" . $d['first_name'] . "  " . $d['last_name'] . "</td>";
                        echo "<td>" . $d['email_address'] . "</td>";
                        echo "<td>" . $d['institution_id'] . "</td>";
                        echo "<td>" . $d['major'] . "</td>";
                        echo "<td>" . $d['graduation_date'] . "</td>";
                        echo "<td>" . $d['cohort_id'] . "</td>";
                        echo "<td>" . $d['city'] . "</td>";
                        echo "<td>" . $d['zip'] . "</td>";
                        echo "<td>" . $d['phone'] . "</td>";
                        echo "<td>" . $d['linkedin'] . "</td>";
                        echo "<td>" . $d['portfolio'] . "</td>";
                        echo "<td>" . $d['age'] . "</td>";
                        echo "<td>" . $d['residency_status'] . "</td>";
                        echo "<td>" . $d['path_id'] . "</td>";
                        echo "<td>" . $d['other_path'] . "</td>";
                        echo "<td>" . $d['active'] . "</td>";
                        echo "<td>" . $d['comments'] . "</td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    $e->getMessage();
                }
                echo "</tbody>";
                echo "</table>";
                echo "</br>" . "<br>";
                echo "</form>"
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