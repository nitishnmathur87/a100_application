<?php
$link = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root');
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>