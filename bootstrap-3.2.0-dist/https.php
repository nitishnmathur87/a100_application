<?php
if($_SERVER["HTTPS"]!="on")
{
header("location: https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
exit();
}
?>