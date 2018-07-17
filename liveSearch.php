<?php
	session_start();

	$xmlDoc=new DOMDocument();
	$xmlDoc->load("xml/ZenTicatalog.xml");

	$x=$xmlDoc->getElementsByTagName('product');

	//get the q parameter from URL
	$q=$_GET["q"];
	

	//lookup all links from the xml file if length of q>0
	if (strlen($q)>0)
	{
	$hint="";
	$idsArray="";
	for($i=0; $i<($x->length); $i++)
	  {
	
	  $y=$x->item($i)->getElementsByTagName('title');
	  $z=$x->item($i)->getElementsByTagName('id');
	  if ($y->item(0)->nodeType==1)
		{
		//find a link matching the search text
		// string stristr  ( string $haystack  , mixed $needle  [, bool $before_needle = false  ] )
		//Returns all of haystack from the first occurrence of needle to the end. 
		// before_needle
		//If TRUE, stristr() returns the part of the haystack before the first occurrence of the needle.
		//needle and haystack are examined in a case-insensitive manner. 
		//http://www.w3schools.com/php/func_string_stristr.asp 
		if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q))
		  {
		  
		  if ($hint=="")
			{		
			$hint="<a href='detail.php?q=" .
			$z->item(0)->childNodes->item(0)->nodeValue .
			"' target='_blank'>" .
			$y->item(0)->childNodes->item(0)->nodeValue . "</a>";
			


			$idsArray = $idsArray . $z->item(0)->childNodes->item(0)->nodeValue . ",";
			
			}
		  else
			{
			$hint=$hint . "<br /><a href='detail.php?q=" .
			$z->item(0)->childNodes->item(0)->nodeValue .
			"' target='_blank'>" .
			$y->item(0)->childNodes->item(0)->nodeValue . "</a>";
			
			$idsArray = $idsArray . $z->item(0)->childNodes->item(0)->nodeValue . ",";

			}
		  }
		}
	  }
	}

	// Set output to "no suggestion" if no hint were found
	// or to the correct values
	if ($hint=="")
	  {
	  $response="no suggestion";
	  }
	else
	  {
	  $response=$hint;
	  }
	  
	//output the response
	echo $response;
	echo "<input type='hidden' id='searchBeforePass' value=". $idsArray. ">";
	

?> 