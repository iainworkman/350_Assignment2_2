function populateModal() {
    document.getElementById("firstNameInput").value = "First Name";
}

	/**Perform an XMLHttpRequest on the given url passing the given parameters using a post request.
	@url: The address of the page to send the parameters to.
	@params: The parameters to pass to the address.
	@callback: A callback function to perform when a response has been received. Pass null if you wish to do nothing.
			The callback should take in one parameter, the responseText of the request.
	*/
	function sendDataOverXMLHttp(url, params, callback)
	{
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("POST", url, true);
				xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xmlhttp.onreadystatechange = function() 
				{
					if (xmlhttp.status == 404)
					{
						
					}
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
						if (callback != null)
						{
							callback(xmlhttp.responseText);
						}
						
					}
				}
				
				xmlhttp.send( params );
	}
	
	/**Gathers all of the input from the input fields and returns it for use in a PostRequest.*/
	function gatherInput(frontVariable)
	{
				var firstName = document.getElementById(frontVariable + "first-name").value;
				var lastName = document.getElementById(frontVariable + "last-name").value;
				var company = document.getElementById(frontVariable + "company").value;
				var phoneNumber = document.getElementById(frontVariable + "phone").value;
				var email = document.getElementById(frontVariable + "email").value;
				var url = document.getElementById(frontVariable + "url").value;
				var birthday = document.getElementById(frontVariable + "birthday").value;
				var date = document.getElementById(frontVariable + "date").value;
				var buildingNumber = document.getElementById(frontVariable + "building-number").value;
				var streetName = document.getElementById(frontVariable + "street-name").value;
				var town = document.getElementById(frontVariable + "town-name").value;
				var region = document.getElementById(frontVariable + "region").value;
				var country = document.getElementById(frontVariable + "country").value;
				var postalCode = document.getElementById(frontVariable + "post-code").value;

				
				var params = 
				"&firstName=" + firstName + 
				"&lastName=" + lastName + 
				"&company=" + company + 
				"&phoneNumber=" + phoneNumber + 
				"&email=" + email + 
				"&url=" + url + 
				"&birthday=" + birthday + 
				"&date=" + date + 
				"&buildingNumber=" + buildingNumber + 
				"&streetName=" + streetName + 
				"&town=" + town + 
				"&region=" + region + 
				"&country=" + country + 
				"&postalCode=" + postalCode;
				
				return params;
	}