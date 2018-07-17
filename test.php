<html xmlns = "http://www.w3.org/1999/xhtml">
<head>

</head>
<body>

<form>
Select a CD:
<select name="cds">
<option value="">Select a CD:</option>
<option value="Bob Dylan">Bob Dylan</option>
<option value="Bonnie Tyler">Bonnie Tyler</option>
<option value="Dolly Parton">Dolly Parton</option>
</select>
</form>
<div id="txtHint"><b>CD info will be listed here...</b></div>
<?php
$q=$_REQUEST["q"];

$xml=simplexml_load_file("xml/ZenTicatalog.xml") or die("Error: Cannot create object");

foreach($xml->children() as $products) {
	if($products->id == $q)
	{
		echo $products->title . ", ";
		echo $products->id . ", ";
		echo $products->price . ", ";
		echo $products->brand . "<br>";
	}
} 
?>
<h3>some html</h3>
<?php
echo $q;
?>
</body>
</html>