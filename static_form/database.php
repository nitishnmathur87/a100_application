<?php
try{
   $db = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root', 'root');
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch (PDOException $e) {
    echo "Connection error " . $e->errorInfo;
}
