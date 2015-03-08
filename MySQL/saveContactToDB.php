<?php
require_once 'C:/xampp/htdocs/350ass2_2/Contact.php';
require_once 'C:/xampp/htdocs/350ass2_2/ContactsFactory.php';
/*
echo "first name: ".$_POST['firstName']."\n";
echo "last name:".$_POST['lastName']."\n";
echo "phone number:".$_POST['phoneNumber']."\n";
echo "email:".$_POST['email']."\n";
echo "company".$_POST['company']."\n";
echo "region:".$_POST['region']."\n";
echo "town name:".$_POST['town']."\n";
echo "country:".$_POST['country']."\n";
echo "url:".$_POST['url']."\n";
echo "birthday:".$_POST['birthday']."\n";
echo "date".$_POST['date']."\n";
echo "building number:".$_POST['buildingNumber']."\n";
echo "street name:".$_POST['streetName']."\n";
echo "postal code:".$_POST['postalCode']."\n";
echo "Transaction Type:".$_POST['transactionType']."\n";
*/

$contact = new Contact(null, $_POST['firstName'], $_POST['lastName'],
           $_POST['company'], $_POST['phoneNumber'], $_POST['email'], $_POST['url'], 
            $_POST['buildingNumber'], $_POST['streetName'], $_POST['town'], 
            $_POST['region'], $_POST['country'], $_POST['postalCode'], $_POST['birthday'], 
            $_POST['date']);
			
			session_start();
			$dsn = $_SESSION["serverName"].";".$_SESSION['database'];
            $username = $_SESSION["userName"];
            $password = $_SESSION['password'];
			$errorMessage = "";
			$error = false;
			$conn;
			try 
			{
				
                $conn = new PDO($dsn, $username, $password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				if ($_POST['transactionType'] == "insert")
				{
					$errorMessage = $errorMessage."\n".ContactsFactory::saveContact($conn, $contact);
				}
				else if ($_POST['transactionType'] == "update")
				{
					$errorMessage = $errorMessage."\n".contactsFactory::updateContact($conn,$contact);
				}
				
            } 
			catch (PDOException $e) 
			{
				$error = true;
                $errorMessage = $errorMessage."\nFailed to connect to the database for the following reason\n".$e->getMessage();
            }
			

		
if (!$error)
{
	echo "Successfully saved contact to database.";
}
else
{
	echo "failed to save the contact to the database with the following errors.: ".$errorMessage;
}

?>