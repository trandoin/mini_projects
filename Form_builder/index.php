<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Drag & Drop Bootstrap Form Builder</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/tether.min.css"/>
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/form_builder.css"/>
    </head>
    <body>
        

        <div class="container">

             <nav class="navbar navbar-light  bg-faded fixed-top">
                <div class="clearfix">
                    <div class="container bg-info py-3">
                        <button style="cursor: pointer;display: none" class="btn btn-warning export_html mt-2 pull-right">Export HTML</button>
                        <h3 class="mr-auto">Drag & Drop Bootstrap Form Builder</h3>
                    </div>
                </div>
            </nav> 
            <br/>
            <div class="clearfix"></div>
            <div class="form_builder" style="margin-top: 25px">
                <div class="row py-3">
                    <div class="col-sm-5">
                         <div class="col-md-12">
                            <form class="form-horizontal">
                                <div class="preview"></div>
                                <div style="display: none" class="form-group plain_html"><textarea rows="50" class="form-control"></textarea></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 bal_builder">
                        <div class="form_builder_area"></div>
                    </div>
                    <div class="col-md-2">
                        <nav class="nav-sidebar">
                            <ul class="nav">
                                <li class="form_bal_textfield">
                                    <a href="javascript:;">Text Field <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_textarea">
                                    <a href="javascript:;">Text Area <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_select">
                                    <a href="javascript:;">Select <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_radio">
                                    <a href="javascript:;">Radio Button <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_checkbox">
                                    <a href="javascript:;">Checkbox <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_email">
                                    <a href="javascript:;">Email <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_number">
                                    <a href="javascript:;">Number <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_password">
                                    <a href="javascript:;">Password <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_date">
                                    <a href="javascript:;">Date <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_button">
                                    <a href="javascript:;">Button <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                            </ul>
                        </nav>

                       
                    </div>
                </div>
            </div>
        </div>
       
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/form_builder.js"></script>

    </body>
</html>
