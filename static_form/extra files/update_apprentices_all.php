 <?php 
include "debug.php";
//require_once "database.php";
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
 try{
   $db = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root', 'root',
       array(PDO::ATTR_PERSISTENT=>true));
   echo "connected";
}
catch (PDOException $e) {
    echo "Unable to connect:  " . $e->errorInfo;
} 
 if(isset($_POST['update'])){
            $sql="UPDATE apprentice SET 
            apprentice_id = :apprentice_id,
            first_name = :first_name, 
            last_name = :last_name, 
            email_address = :email_address,  
            password = :password,  
            institution_id = :institution_id ,
            major = :major,
            graduation_date = :graduation_date,
            cohort_id= :cohort_id,
            address = :address,
            city = :city,
            state_id = :state_id,
            zip = :zip,
            phone= :phone,
            linkedin = :linkedin,
            portfolio = :portfolio,
            age = :age,  
            residency_status = :residency_status,
            path_id = :path_id, 
            other_path = :other_path, 
            active = :active,
            comments = :comments 
            WHERE apprentice_id = $_POST[hidden]";
      
    
         $stmt=$db->prepare($sql);
         if(!$stmt) { echo "connection error" ; }
        
          
   // $stmt = querymysql($sql);
    $stmt -> bindParam(':apprentice_id', $_POST['apprentice_id'], PDO::PARAM_INT);
    $stmt -> bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);
    $stmt -> bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR);
    $stmt -> bindParam(':email_address', $_POST['email_address'], PDO::PARAM_STR);
    $stmt -> bindParam(':password', $_POST['cryptpass'], PDO::PARAM_STR);
    $stmt -> bindParam(':institution_id', $_POST['institution_id'], PDO::PARAM_INT);
    $stmt -> bindParam(':major', $_POST['major'], PDO::PARAM_STR);
    $stmt -> bindParam(':graduation_date', $_POST['graduation_date'],PDO::PARAM_STR);
    $stmt -> bindParam(':cohort_id', $_POST['cohort_id'], PDO::PARAM_INT);
    $stmt -> bindParam(':address', $_POST['address'], PDO::PARAM_STR);
    $stmt -> bindParam(':city', $_POST['city'], PDO::PARAM_STR);
    $stmt -> bindParam(':state_id', $_POST['state_id'], PDO::PARAM_INT);
    $stmt -> bindValue(':zip', $_POST['zip'], PDO::PARAM_STR);
    $stmt -> bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
    $stmt -> bindParam(':linkedin', $_POST['linkedin'], PDO::PARAM_STR);
    $stmt -> bindParam(':portfolio', $_POST['portfolio'], PDO::PARAM_STR);
    $stmt -> bindParam(':age', $_POST['age'], PDO::PARAM_INT);
    $stmt -> bindParam(':residency_status', $_POST['residency_status'], PDO::PARAM_INT);
    $stmt -> bindParam(':path_id', $_POST['path_id'], PDO::PARAM_INT);
    $stmt -> bindParam(':other_path', $_POST['other_path'], PDO::PARAM_STR);
    $stmt -> bindParam(':active', $_POST['active'], PDO::PARAM_INT);
    $stmt -> bindParam(':comments', $_POST['comments'], PDO::PARAM_STR);
    $stmt -> bindParam(':apprentice_id', $_POST['apprentice_id'], PDO::PARAM_INT); 
    $stmt->execute(); 
    $rows = $stmt->columnCount();
    echo "Update successful." . $rows . " get affected .";
 }


        $stmt = $db->prepare("SELECT * FROM apprentice");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<table border='1'>
        <tr>
        <th>Apprentice ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>Password</th>
        <th>Institution_id</th>
        <th>Major</th>
        <th>Graduation_date</th>
        <th>Cohort_id</th>
        <th>Address</th>
        <th>City</th>
        <th>State ID</th>
        <th>Zip Code</th>
        <th>Phone</th>
        <th>Linkedin Info</th>
        <th>Online Portfolio</th>
        <th>18 Older?</th>
        <th>Work Authorization</th>
        <th>Path ID</th>
        <th>Active</th>
        <th>Comments</th>
        </tr>";
        
        foreach ($data as $d) {
        echo "<form action=update_apprentices_all.php method=post>";
        echo "<tr>";
        echo "<td>" . "<input type=text name=apprentice_id value=" .  $d['apprentice_id'] . " </td>";
        echo "<td>" . "<input type=text name=first_name value=" .  $d['first_name'] . " </td>";
        echo "<td>" . "<input type=text name=last_name value=" . $d['last_name']. " </td>";
        echo "<td>" . "<input type=text name=email_address value=" . $d['email_address'] . " </td>";
        echo "<td>" . "<input type=text name=password value=" . $d['password'] . " </td>";
        echo "<td>" . "<input type=text name=institution_id value=" . $d['institution_id'] . " </td>";
        echo "<td>" . "<input type=text name=major value=" .  $d['major'] . " </td>";
        echo "<td>" . "<input type=text name=graduation_date value=" .  $d['graduation_date'] .  "  </td>";
        echo "<td>" . "<input type=text name=cohort_id value=" . $d['cohort_id'] . " </td>";
        echo "<td>" . "<input type=text name=address value=" . $d['address'] . " </td>";
        echo "<td>" . "<input type=text name=city value=" . $d['city'] . " </td>";
        echo "<td>" . "<input type=text name=state_id value=" . $d['state_id'] . " </td>";
        echo "<td>" . "<input type=text name=zip value=" . $d['zip'] . " </td>";
        echo "<td>" . "<input type=text name=phone value=" . $d['phone'] . " </td>";
        echo "<td>" . "<input type=text name=linkedin value=" . $d['linkedin'] . " </td>";
        echo "<td>" . "<input type=text name=portfolio value=" . $d['portfolio'] . " </td>";
        echo "<td>" . "<input type=text name=age value=" . $d['age'] . " </td>";
        echo "<td>" . "<input type=text name=residency_status value=" . $d['residency_status'] . " </td>";
        echo "<td>" . "<input type=text name=path_id value=" . $d['path_id'] . " </td>";
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
