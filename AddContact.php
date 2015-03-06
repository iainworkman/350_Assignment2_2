<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Add Contact</title>

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
            <!-- Modal -->
            <div id="add-contact-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" style="color:white;" href="ContactPage.php">&times; </a>
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
                            <a class="btn btn-primary" href="ContactPage.php">Close</a>
                            <button type="button" class="btn btn-success">Add Contact</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
        </div>
        <?php
// put your code here
        ?>

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

                    $("#add-contact-modal-body").mCustomScrollbar({
                        theme: "light-thin",
                        scrollInertia: 100
                    });
                });
            })(jQuery);
        </script>
    </body>
</html>
