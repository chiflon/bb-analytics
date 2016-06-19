<?php
/**
 * @Author: Daniel Lozano
 * @Date:   2016-06-19 08:20:32
 * @Last Modified by:   Daniel Lozano
 * @Last Modified time: 2016-06-19 15:58:04
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $pageTitle; ?></title>

        <link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.css">

        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>

        <!-- Page Content -->
        <div class="container">

            <?php require($this->viewPath); ?>

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p></p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <script type="text/javascript" src="/assets/jquery/dist/jquery.js"></script>
        <script type="text/javascript" src="/assets/bootstrap/dist/js/bootstrap.js"></script>
    </body>
</html>