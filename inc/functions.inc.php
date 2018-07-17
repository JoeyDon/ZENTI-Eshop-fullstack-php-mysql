<?php
function writeShoppingCart() {
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return '<p>You have no items in your shopping cart</p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<p>You have <a href="cart.php">'.count($items).' item'.$s.' in your shopping cart</a></p>';
	}
}



function showCart() {
	/* Oracle
	global $db;
	$dbuser = "zhiyi"; 
    $dbpass = "Ninispose1"; 
    $dbname = "SSID"; 
    $db = oci_connect($dbuser, $dbpass, $dbname); 
	*/
	$dbuser = 'rjedwrte_WP6BK';
	$dbpass = 'ninis1';
	$db = 'rjedwrte_WP6BK';
	
	$db = new mysqli('localhost', $dbuser, $dbpass, $db) or die("Unable to connect database");
    if (!$db)  {
      echo "An error occurred connecting to the database"; 
      exit; 
    }
	$cart = $_SESSION['cart'];
	$total = 0;
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		
		$output[] = '<tbody>';

		foreach ($contents as $id=>$qty) {
		
			$sql = 'SELECT * FROM products WHERE id = '.$id;

			$result = $db->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					$title = $row["title"];
					$price = $row["price"];
					$id = $row["id"];
					$image = $row["img"];
				}
			}
			
			
			$output[] = '<tr>';
			$output[] = '<td><a href="#"><img src="'.$image.'" alt="'.$title.'"></a></td>';
			$output[] = '<td><a href="detail.php?q='.$id.'">'.$title.'</a></td>';
			$output[] = '<td><input type="text" name="'.$id.'" value="'.$qty.'" class="form-control" onChange="changeQuantity(this.value,this.name)"></td>';
			$output[] = '<td>$'.$price.'</td>';
			$output[] = '<td>$0.00</td>';
			$output[] = '<td>$'.($price * $qty).'.00</td>';
			
			$total += $price * $qty;
			$output[] = '<td><a href="basket.php?action=delete&id='.$id.'"><i class="fa fa-trash-o"></i></a></td>';
		}
		
		$output[] = '</tbody>';
		
		$output[] = '<tfoot id="totaltf"><tr><th colspan="5">Total</th>';
		$output[] = '<th colspan="2">$'.$total.'.00</th></tfoot>';

		$GLOBALS['totalPrice'] = $total;
	} else {
		$output[] = '<p>You shopping cart is empty.</p>';
	}
	return join('',$output);
}

?>