<?php
// Include database connection
require_once('inc/global-connect.inc.php');
// Include functions
require_once('inc/functions.inc.php');
// Start the session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>PHP Shopping Cart Demo &#0183; Bookshop</title>
	<link rel="stylesheet" href="css/styles.css" />
</head>

<body>

<div id="shoppingcart">

<h1>Your Shopping Cart</h1>

<?php
echo writeShoppingCart();
?>

</div>

<div id="booklist">

<h1>Products In Our Store</h1>

<?php
  
$sql = "SELECT * FROM products ORDER BY id";

$stmt = oci_parse($db, $sql); 
  
if(!$stmt)  {
    echo "An error occurred in parsing the sql string.\n"; 
    exit; 
  }
oci_execute($stmt); 

$output[] = '<ul>';

while(oci_fetch_array($stmt)) {

	$title= oci_result($stmt,"TITLE");
	$price = oci_result($stmt,"PRICE");
	$id = oci_result($stmt,"ID");
	$output[] = '<li>"'.$title.'": AU$ '.$price.'<br /><a href="cartTest.php?action=add&id='.$id.'">Add to cart</a></li>';
}
$output[] = '</ul>';
echo join('',$output);

?>

</div>

</body>
</html>