<?php
session_start();

$str = $_REQUEST["str"];
$type = $_REQUEST["type"];

$redStyle = "<h5 style='color:red'>";

if ($type == "firstname")
{
	if (!preg_match("/^[A-Za-z][a-z]{1,10}$/",$str)) {
      echo "<br/> $redStyle A valid first name should look like: James or james and within 2 to 10 letters </h4>";
    }
	else{
		$_SESSION['firstname'] = $str;
	}
}

if ($type == "lastname")
{
	if (!preg_match("/^[A-Za-z][a-z]{1,10}$/",$str)) {
      echo "<br/>  $redStyle A valid last name should look like: Smith or smith and within 2 to 10 letters </h4>";
    }
	else{
		$_SESSION['lastname'] = $str;
	}
}

if ($type == "address")
{
	if (!preg_match("/^\d+\s[A-z]+\s[A-z]+/",$str)) {
      echo "<br/> $redStyle A valid address should look like: 61 Park Street </h4>";
    }
	else{
		$_SESSION['address'] = $str;
	}
}

if ($type == "city")
{
	if (!preg_match("/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/",$str)) {
      echo "<br/> $redStyle A valid city name should look like: Melbourne( single word and without space ahead)</h4>";
    }
	else{
		$_SESSION['city'] = $str;
	}
}

if ($type == "postcode")
{
	if (!preg_match("/^[2-7]{1}[0-9]{3}$/",$str)) {
      echo "<br/> $redStyle A valid postcode should start from 2-7 and be 4 digits)</h4>";
    }
	else{
		$_SESSION['postcode'] = $str;
	}
}

if ($type == "phone")
{
	if (!preg_match("/^\({0,1}((0|\+61)(2|4|3|7|8)){0,1}\){0,1}(\ |-){0,1}[0-9]{2}(\ |-){0,1}[0-9]{2}(\ |-){0,1}[0-9]{1}(\ |-){0,1}[0-9]{3}$/",$str)) {
      echo "<br/> $redStyle A valid phobne number should look like: +61 02 9123 1234 or  0400 111 222 (could be without space))</h4>";
    }
	else{
		$_SESSION['phone'] = $str;
	}
}

if ($type == "email")
{
	if (!preg_match("/^(\w[-._+\w]*\w@\w[-._\w]*\w\.\w{2,3})$/",$str)) {
      echo "<br/> $redStyle A valid email address should look like: abc@xx.com </h4>";
    }
	else{
		$_SESSION['email'] = $str;
	}
}

if ($type == "cardname")
{
	if (!preg_match("/^\s*([A-Z\s])([a-z\s]){1,30}([A-Z\s])([a-z\s]){1,30}\s*$/",$str)) {
      echo "<br/>A valid name look like: Zhiyi Dong </h4>";
    }
	else{
		$_SESSION['cardname'] = $str;
	}
}

if ($type == "cardnumber")
{
	if (!preg_match("/^5[1-5][0-9]{14}$/",$str) && !preg_match("/^4[0-9]{12}(?:[0-9]{3})?$/",$str)) {
      echo "<br/> $redStyle A valid master card number looks like: 	5105105105105100 </h4>";
	  echo "<br/> $redStyle A valid visa card number looks like: 	4012888888881881 </h4>";
    }
	else{
		$_SESSION['cardnumber'] = $str;
	}
}

if ($type == "expirymonth")
{
	if (!preg_match("/^(0[1-9]|1[0-2])$/",$str)) {
      echo "<br/> $redStyleA valid month is between 01 - 12 </h4>";
    }
	else{
		$_SESSION['expirymonth'] = $str;
	}
}

if ($type == "expiryyear")
{
	if (!preg_match("/^(20[0-9][0-9])$/",$str)) {
      echo "<br/> $redStyle A valid year is between 2000 - 2099 </h4>";
    }
	else{
		$_SESSION['expiryyear'] = $str;
	}
}

if ($type == "cvv")
{
	if (!preg_match("/^([0-9][0-9][0-9])$/",$str)) {
      echo "<br/> $redStyle A valid cvv is 3 digits </h4>";
    }
	else{
		$_SESSION['cvv'] = $str;
	}
}
?>