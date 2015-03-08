<?php
require_once 'C:/xampp/htdocs/350ass2_2/ContactsFactory.php';

	$contactId = $_GET['contactId'];
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
                ContactsFactory::deleteContact($conn,$contactId);
            } 
			catch (PDOException $e) 
			{
				$error = true;
                $errorMessage = $errorMessage."\nFailed to connect to the database for the following reason\n".$e->getMessage();
            }
			

		
if (!$error)
{
	echo "Successfully Removed The Contact From the Database.";
}
else
{
	echo "failed to save the contact to the database with the following errors.: ".$errorMessage;
}

header("Location: ../ContactPage.php"); //redirect the browser to the beginning page.
?>