<?php
include "debug.php";
require_once "database.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search User by First Name</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/form.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
            <h3 class="alert-info">Display Apprentices and the Associated Institutions</h3>
            <div class="table-responsive table-condensed table-hover table-striped">
                <?php
                echo "<table border='1'>
        <tr>
        <th>Institution Name</th>
        <th>First Name </th>
        <th>last Name</th>
        <th>Joined Cohort Group</th>
        <th>How Did you Learn A100 Program?</th>
       </tr>";
                try {
                    $stmt = $db->prepare("SELECT i.institution_name, a.first_name, a.last_name,  c.schedule, p.description FROM apprentice AS a INNER JOIN institution AS i on a.institution_id=i.id INNER JOIN cohort AS c on a.cohort_id=c.cohort_id INNER JOIN path_to_a100 AS p on a.path_id=p.path_id  ORDER by i.institution_name");
                    $stmt->execute();
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($data as $d) {
                        echo "<form action=apprentice_college.php method=post>";
                        echo "<tr>";
                        echo "<td>" . $d['institution_name'] . "</td>";
                        echo "<td>" . $d['first_name'] . "</td>";
                        echo"<td>" . $d['last_name'] . "</td>";
                        echo "<td>" . $d['schedule'] . "</td>";
                        echo "<td>" . $d['description'] . "</td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    $e->getMessage();
                }
                echo "</table>";
                echo "</br>" . "<br>";
                echo "</form>"
                ?>
            </div>
        </div>
        <?php
        include "lookup_forms.php";
        ?>
    </body>

</html>