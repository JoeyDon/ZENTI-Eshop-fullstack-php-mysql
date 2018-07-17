// this page is to achive on-fly validate in backend by php

function validate(str,type) { 

    if (str.length == 0) {
		// type + "Response": type is the id of tag
		// if the case is firstname, then that span will be firstnameResponse as I designed.
		// so response will be rendered back to that span every time.
        document.getElementById(type + "Response").innerHTML = ""; 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(type + "Response").innerHTML = this.responseText;
				console.log(str + "    " + type);
				
				
				// if error exists, disable the button.
				if(document.getElementById(type + "Response").innerHTML.length > 2)
				{
					$("#btnCheckout1").attr("disabled", "disabled");
					$("#btnCheckout3").attr("disabled", "disabled");
				}
				
				// no error, user can access the button
				else
				{
					$("#btnCheckout1").removeAttr("disabled");
					$("#btnCheckout3").removeAttr("disabled");
				}
            }
        };
        xmlhttp.open("GET", "validate.php?str=" + str + "&type=" + type, true);
        xmlhttp.send();
    }
}

function validateCard(){
	if (document.getElementById("payment2").checked == false)
	{
		return true;
	}
	else{
		if( document.getElementById("cardnameResponse").innerHTML == "" && document.getElementById("cardnumberResponse").innerHTML == "" && document.getElementById("expirymonth").innerHTML == ""
		&& document.getElementById("expiryyear").innerHTML == "" && document.getElementById("cvv").innerHTML == "")
		{
			console.log("1");
			if ($("#cardname").val() == "" || $("#cardnumber").val() == "" || $("#expirymonth").val() == "" || $("#expiryyear").val() == "" || $("#cvv").val() == "")
			{
				$("#errMessage").html("<h5 style='color:red;'>You must fill all the fields!</h5>");
				console.log("11");
				return false;
				
			}
			else{
				console.log("12");
				return true;
			}
		}
		else{
			$("#errMessage").html("<h5 style='color:red;'>Fix them with the below given message!</h5>");
			return false;
		}
	}
}