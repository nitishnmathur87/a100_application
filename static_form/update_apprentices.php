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
            <h3 class="alert-info">You can modify an apprentice information and click "update" at the end of the row</h3>
            <div class="table-responsive table-condensed table-hover table-striped">
                <?php
                if (isset($_POST['update'])) {
                    $sql = "UPDATE apprentice SET 
            apprentice_id = :apprentice_id,
            first_name = :first_name, 
            city = :city,
            phone= :phone,
            linkedin = :linkedin,
            portfolio = :portfolio,
            other_path = :other_path, 
            active = :active,
            comments = :comments 
            WHERE apprentice_id = $_POST[hidden]";

                    $stmt = $db->prepare($sql);
                    if (!$stmt) {
                        echo "connection error";
                    }


                    // $stmt = querymysql($sql);
                    $stmt->bindParam(':apprentice_id', $_POST['apprentice_id'], PDO::PARAM_INT);
                    $stmt->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);
                    $stmt->bindParam(':city', $_POST['city'], PDO::PARAM_STR);
                    $stmt->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
                    $stmt->bindParam(':linkedin', $_POST['linkedin'], PDO::PARAM_STR);
                    $stmt->bindParam(':portfolio', $_POST['portfolio'], PDO::PARAM_STR);
                    $stmt->bindParam(':other_path', $_POST['other_path'], PDO::PARAM_STR);
                    $stmt->bindParam(':active', $_POST['active'], PDO::PARAM_INT);
                    $stmt->bindParam(':comments', $_POST['comments'], PDO::PARAM_STR);
                    $stmt->bindParam(':apprentice_id', $_POST['apprentice_id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $cols = $stmt->columnCount();
                    // echo "Update successful." . $cols . " get affected .";
                }
                $stmt = $db->prepare("SELECT apprentice_id, first_name, last_name, city, linkedin, portfolio, other_path, active, comments FROM apprentice");
                $stmt->execute();
                $data = $stmt->fetchAll();
                echo "<table border='1'>
                 <tr>
                    <th>Apprentice ID</th>
                    <th>First Name</th>
                    <th>City</th>
                    <th>Linkedin Info</th>
                    <th>Online Portfolio</th>
                    <th>Other Path</th>
                    <th>Active</th>
                    <th>Comments</th>
                 </tr>";

                foreach ($data as $d) {
                    echo "<form action=retrieve_update.php method=post>";
                    echo "<tr>";
                    echo "<td>" . "<input type=text name=apprentice_id value=" . $d['apprentice_id'] . " </td>";
                    echo "<td>" . "<input type=text name=first_name value=" . $d['first_name'] . " </td>";
                    echo "<td>" . "<input type=text name=city value=" . $d['city'] . " </td>";
                    echo "<td>" . "<input type=text name=linkedin value=" . $d['linkedin'] . " </td>";
                    echo "<td>" . "<input type=text name=portfolio value=" . $d['portfolio'] . " </td>";
                    echo "<td>" . "<input type=text name=other_path value=" . $d['other_path'] . " </td>";
                    echo "<td>" . "<input type=text name=active value=" . $d['active'] . " </td>";
                    echo "<td>" . "<input type=text name=comments value=" . $d['comments'] . " </td>";
                    echo "<td>" . "<input type=hidden name=hidden value=" . $d['apprentice_id'] . " </td>";
                    echo "<td>" . "<input type=submit name=update value=update" . " </td>";
                    echo "</tr>";
                    echo "</form>";
                }
                echo "</table>";
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
