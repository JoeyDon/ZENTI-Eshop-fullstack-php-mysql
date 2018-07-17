<?php

  
  /*  for Oracle on Deakin testing
  $dbuser = "zhiyi"; 
  $dbpass = "Ninispose1"; 
  $dbname = "SSID"; 
  $db = oci_connect($dbuser, $dbpass, $dbname); 

  if (!$db)  {
    echo "An error occurred connecting to the database"; 
    exit; 
  }
  */
	$dbuser = 'rjedwrte_WP6BK';
	$dbpass = 'ninis1';
	$db = 'rjedwrte_WP6BK';
	
	$db = new mysqli('localhost', $dbuser, $dbpass, $db) or die("Unable to connect database");
  
?>