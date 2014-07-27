<?php

Stack::lookup(); 

 class Stack {
     const LINUX = 0; 
     const APACHE = 1; 
     const MYSQL = 2; 
     const PHP = 3; 
     const HTML = 4; 
     const CSC = 5; 
     const JAVASCRIPT = 6; 
     const DRUPAL = 7; 
     const DROOMLA = 8; 
     const WORDPRESS = 9; 
 
 static function lookup(){
     echo self::LINUX; 
  }
 }
?>