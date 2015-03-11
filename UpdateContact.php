<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Update Contact</title>

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
    <body style="padding-top: 5px;">

        <div id="contactDetails" class="container">
            <?php
            require_once 'ContactsFactory.php';
            require_once 'UpdateContact_code.php';
            session_start();
            $dsn = $_SESSION['serverName'] . ";" . $_SESSION['database'];
            $username = $_SESSION['userName'];
            $password = $_SESSION['password'];
            $contactId = $_GET['ContactId'];
            try {
                $db = new PDO($dsn, $username, $password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $contact = ContactsFactory::getContact($db, $contactId);
                buildModal($contact);
            } catch (PDOException $e) {
                echo '<div>' . $e->getMessage() . '</div>';
            }
            ?>



        </div>

        <script>

            function validateContact()
            {
                var firstNameInput = document.getElementById("update-contact-first-name");
                if(firstNameInput.value === "") 
                {
                    var errorDiv = document.createElement("div");
                    errorDiv.setAttribute("style", "color: red;");
                    errorDiv.setAttribute("id", "first-name-error");
                    errorDiv.innerHTML = "First Name is required.";
                    firstNameInput.parentNode.appendChild(errorDiv);
                    return false;
                }
                else
                {
                    var errorDiv = document.getElementById("first-name-error");
                    if(errorDiv !== null) 
                    {
                        errorDiv.parentNode.removeChild(errorDiv);
                    }
                    
                }
                
                return true;
            }
            
            function updateContact()
            {
                if(!validateContact())
                    return;
                
                var params = gatherInput("update-contact-");
                params = params + "&transactionType=update";
                params = params + "&contactId=" + <?php echo $contactId ?>;
                var callback = function (responseText)
                {
                    alert(responseText);
                    window.location.assign('ContactPage.php');
                }
                alert(sendDataOverXMLHttp("MySQL/saveContactToDB.php", params, callback));
            }
        </script>

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

                    $("#update-contact-modal-body").mCustomScrollbar({
                        theme: "light-thin",
                        scrollInertia: 100
                    });
                });
            })(jQuery);
        </script>
    </body>
</html>
