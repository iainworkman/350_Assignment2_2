<!DOCTYPE html>

<html>
	<head>
	</head>
	<body>
		<?php
			$servername="lovett.usask.ca";
			$username="cmpt350_ipw969";
			$password="ufsan8x16h";
			$dbname="cmpt350_ipw969";
			
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if($conn->connect_error)
			{
				die("connection failed ".$conn->connect_error);
			}
			else
			{
				echo "Connected successfully";
			}
			session_start();
			$_SESSION["serverName"] = "mysql:host=".$servername;
			$_SESSION["userName"] = $username;
			$_SESSION["password"] = $password;
			$_SESSION["database"] = "dbname=".$dbname;
			$_SESSION["type"] = "MySQL";
			
			
			#echo "<br/>".$_SESSION["serverName"]."<br/>";
			#echo $_SESSION["userName"]."</br>";
			#echo $_SESSION["password"]."</br>";
			#echo $_SESSION["database"]."</br>";
			#echo $_SESSION["type"]."</br>";
			
			header("Location: ../ContactPage.php");
?>
	</body>
</html>