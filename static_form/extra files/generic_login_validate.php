<?php // authenticate.php
require_once 'login.php';
require_once 'database.php';

  
  if (isset($_SERVER['PHP_AUTH_USER']) &&
      isset($_SERVER['PHP_AUTH_PW']))
  {
    $un_temp = mysqli_entities_fix_string($db, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = mysqli_entities_fix_string($db, $_SERVER['PHP_AUTH_PW']);

    $query  = "SELECT * FROM users WHERE username='$un_temp'";
    $result = $db->query($query);
    if (!$result) die($db->error);
    elseif ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

		$result->close();

        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");

        if ($token == $row[3]) echo "$row[0] $row[1] : 
        	Hi $row[0], you are now logged in as '$row[2]'";
        else die("Invalid username/password combination");
    }
    else die("Invalid username/password combination");
  }
  else
  {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
  }

  $connection->close();

  function mysql_entities_fix_string($connection, $string)
  {
    return htmlentities(mysql_fix_string($connection, $string));
  }	

  function mysql_fix_string($connection, $string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }
?>