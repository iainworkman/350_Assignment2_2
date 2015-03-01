<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>CMPT350 - Assignment 2 Part B</title>

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
                    <a class="navbar-brand" href="#">Contacts</a>
                    <button type="button" class="btn btn-success" style="margin-top:7px" data-toggle="modal" data-target="#add-contact-modal">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"  style="color:white;"></span>
                    </button>
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

        <!-- Modal -->
        <div id="add-contact-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add-modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:white;">&times;  </button>
                        <h4 class="modal-title" id="add-modal-label">Add Contact</h4>

                    </div>
                    <div id="add-contact-modal-body" class="modal-body" style="max-height: 65vh;">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="add-contact-first-name" class="col-sm-3 control-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add-contact-first-name" placeholder="First Name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-last-name" class="col-sm-3 control-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add-contact-last-name" placeholder="Last Name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-company" class="col-sm-3 control-label">Company</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add-contact-company" placeholder="Company"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-phone" class="col-sm-3 control-label">Phone Number</label>
                                <div class="col-sm-9">
                                    <input type="tel" class="form-control" id="add-contact-phone" placeholder="Phone Number"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="add-contact-email" placeholder="Email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-url" class="col-sm-3 control-label">URL</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="add-contact-url" placeholder="Url"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-birthday" class="col-sm-3 control-label">Birthday</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="add-contact-birthday" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-date" class="col-sm-3 control-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="add-contact-date" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-buidling-number" class="col-sm-3 control-label">Building #</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add-contact-buidling-number" placeholder="House or Building Number"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-street-name" class="col-sm-3 control-label">Street Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add-contact-street-name" placeholder="Street Name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-town-name" class="col-sm-3 control-label">Town/City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add-contact-town-name" placeholder="Town/City"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-region" class="col-sm-3 control-label">Region</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add-contact-region" placeholder="Region or Province"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-country" class="col-sm-3 control-label">Country</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add-contact-country" placeholder="Country"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add-contact-post-code" class="col-sm-3 control-label">Post Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="add-contact-post-code" placeholder="Postal Code"/>
                                </div>
                            </div>
                            <div class="form-group" style="padding-left:30px; padding-right:20px;">
                                <label for="add-contact-notes" class="control-label">Notes</label>
                                <textarea id="add-contact-notes" class="form-control" rows="3"></textarea>                                   
                            </div>                                
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group col-xs-2" >
                            <button type="button" class="btn btn-danger" style="align-self:left;">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true" style="color:white;"></span>
                            </button>
                        </div>
                        <div class="form-group col-xs-10">                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <div id="contactList" class="container" style="max-height:85vh;">
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
                    buildModal($current);
                }
            } catch (PDOException $e) {
                echo '<div>' . $e->getMessage() . '</div>';
            }
            ?>
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

                    $(".modal-body").mCustomScrollbar({
                        theme: "light-thin",
                        scrollInertia: 100
                    });

                    $("#contactList").mCustomScrollbar({
                        theme: "light-thin",
                        scrollInertia: 100
                    });
                });
            })(jQuery);
        </script>
    </body>
</html>

