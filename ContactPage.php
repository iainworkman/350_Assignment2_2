<!DOCTYPE html>
		<?php
		#Check to make sure the session variables came accross ok.
		/*session_start();
			echo "<br/>".$_SESSION["serverName"]."<br/>";
			echo $_SESSION["userName"]."</br>";
			echo $_SESSION["password"]."</br>";
			echo $_SESSION["database"]."</br>";
			echo $_SESSION["type"]."</br>";
			*/
		?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Contacts</title>

        <!-- Roboto Font from Google -->
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this design -->
        <link href="css/assignment2_2.css" rel="stylesheet">

        <!-- Custom Scroll Bars by http://manos.malihu.gr/jquery-custom-content-scroller/ -->
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                    <form class ="navbar-brand" action="AddContact.php">
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"  style="color:white;"></span>
                        </button>
                    </form>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>                            
                    </form>
                </div>
            </div>
        </nav>

        <div id="contactList" class="container" style="max-height:85vh;">
            <table class="table">
                <?php
                require_once 'ContactsFactory.php';
                require_once 'ContactPage_code.php';
                $dsn = "mysql:host=lovett.usask.ca;dbname=cmpt350_ipw969";
                $username = "cmpt350_ipw969";
                $password = "ufsan8x16h";
                try {
                    $db = new PDO($dsn, $username, $password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    $contacts = ContactsFactory::getContacts($db);
                    foreach ($contacts as $current) {
                        buildWell($current->getContactId(), $current->getFirstName(), $current->getLastName());
                    }
                } catch (PDOException $e) {
                    echo '<div>' . $e->getMessage() . '</div>';
                }
                ?>
            </table>                
        </div>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/docs.min.js"></script>
        <!-- custom scrollbar plugin -->
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
        <!-- JavaScript for assignment 2.2-->
        <script src="js/assignment2_2.js"></script>
        <script>
            (function ($) {
                $(window).load(function () {

                    $("#contactList").mCustomScrollbar({
                        theme: "light-thin",
                        scrollInertia: 100
                    });
                });
            })(jQuery);
        </script>
		

    </body>
</html>

