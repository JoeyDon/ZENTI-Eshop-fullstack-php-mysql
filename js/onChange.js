// this js is for updating shopping cart in basket.php page

function changeQuantity(newNum,productID)
{
	// my cart updating algorithsm is:
	// 1. sort the cart data: e.g. from 1,4,2,3,2 to 1,2,2,3,4
	// 2. check updated number and generate new pattern: e.g. 1,1,1,1
	// 3. replace pattern ( so quantity changed)
	// 4. refresh page
	
	var cartData = document.getElementById('cartData').attributes[1].value; // get data from php(left in html)
	console.log(cartData);
	
	var dataArray = cartData.split(","); // split into array
	dataArray.sort(); // sort it
	
	var SortedCartData="";
	
	for(var i = 0; i < dataArray.length; i ++) // back to string but sorted
	{
		SortedCartData += dataArray[i] ;
		
		if (i != (dataArray.length-1) )
		{
			SortedCartData += ",";
		}
	}
	
	console.log(SortedCartData);
	
	var FirstIndex = SortedCartData.indexOf(productID); // get first index of item changed from sorted string
	var LastIndex = SortedCartData.lastIndexOf(productID); // get last index of item changed from sorted string
	console.log("First index is "+FirstIndex);
	console.log("Last index is "+LastIndex);
	
	var SlicedCartData = SortedCartData.slice(FirstIndex,LastIndex+2); // last + 2 due to slice algorithsm
	console.log("The pattern sliced out "+SlicedCartData);
	
	var newChangedPattern = "";
	
	if( newNum == 0)
	{
		newChangedPattern = "";
	}
	else
	{
		for(var i = 0; i < newNum; i++)
		{
			newChangedPattern+= productID;
			newChangedPattern += ",";
		}
		
		console.log("new pattern before replace in is :" + newChangedPattern);
	}
	
	
	// replace the new pattern with old one
	var CompletedUpdateCart = SortedCartData.replace(SlicedCartData,newChangedPattern);

	if (CompletedUpdateCart.endsWith(","))
	{
		CompletedUpdateCart = CompletedUpdateCart.substring(0, CompletedUpdateCart.length - 1);
	}
	console.log("New order ready to go :"+CompletedUpdateCart);
	
	SortedCartData = CompletedUpdateCart;
	
	// update new cart
	document.getElementById("cart").action = "basket.php?action=update&newcart="+CompletedUpdateCart;
}