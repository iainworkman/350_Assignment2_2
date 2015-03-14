<?php
		try {
			
		
			$servername="sqlsrv:server=tcp:i6lcjk65hs.database.windows.net,1433";
			$username="ral362@i6lcjk65hs";
			$password="RaptorJesusGod5";
			$dbname="Database=350assignment2";
			
			$conn = new PDO($servername+";"+$dbname, $username, $password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			echo "Connected successfully";
		}
		catch (PDOException $e)
		{
			echo "Error Connecting to the database with the following message\n".$e->getMessage();
		}
			session_start();
			$_SESSION["serverName"] = $servername;
			$_SESSION["userName"] = $username;
			$_SESSION["password"] = $password;
			$_SESSION["database"] = $dbname;
			$_SESSION["type"] = "Azure";
			
			
			echo "<br/>".$_SESSION["serverName"]."<br/>";
			echo $_SESSION["userName"]."</br>";
			echo $_SESSION["password"]."</br>";
			echo $_SESSION["database"]."</br>";
			echo $_SESSION["type"]."</br>";
			
			header("Location: ../ContactPage.php");
?>