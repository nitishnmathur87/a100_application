<?php
Language::lookup(); 
 class Laguage {
     const HTML = 1; 
     const CSC = 2; 
     const JAVASCRIPT = 3; 
 static function lookup(){
     echo self::HTML; 
  }
 }
?>