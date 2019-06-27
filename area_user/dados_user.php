<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Meus Dados</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">

    <?php include "menu_user.php" ?>
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <?php include "header_user.php" ?>

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">Meus Dados</div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                <!--                                        <h3 class="text-center title-2">Pay Invoice</h3>-->
                                            </div>
                                            <!--                                    <hr>-->
                                            <form action="" method="post" novalidate="novalidate">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Payment
                                                        amount</label>
                                                    <input id="cc-pament" name="cc-payment" type="text"
                                                           class="form-control"
                                                           aria-required="true" aria-invalid="false" value="100.00">
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Name on card</label>
                                                    <input id="cc-name" name="cc-name" type="text"
                                                           class="form-control cc-name valid" data-val="true"
                                                           data-val-required="Please enter the name on card"
                                                           autocomplete="cc-name" aria-required="true"
                                                           aria-invalid="false"
                                                           aria-describedby="cc-name-error">
                                                    <span class="help-block field-validation-valid"
                                                          data-valmsg-for="cc-name"
                                                          data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Card
                                                        number</label>
                                                    <input id="cc-number" name="cc-number" type="tel"
                                                           class="form-control cc-number identified visa" value=""
                                                           data-val="true"
                                                           data-val-required="Please enter the card number"
                                                           data-val-cc-number="Please enter a valid card number"
                                                           autocomplete="cc-number">
                                                    <span class="help-block" data-valmsg-for="cc-number"
                                                          data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp"
                                                                   class="control-label mb-1">Expiration</label>
                                                            <input id="cc-exp" name="cc-exp" type="tel"
                                                                   class="form-control cc-exp" value="" data-val="true"
                                                                   data-val-required="Please enter the card expiration"
                                                                   data-val-cc-exp="Please enter a valid month and year"
                                                                   placeholder="MM / YY"
                                                                   autocomplete="cc-exp">
                                                            <span class="help-block" data-valmsg-for="cc-exp"
                                                                  data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="x_card_code" class="control-label mb-1">Security
                                                            code</label>
                                                        <div class="input-group">
                                                            <input id="x_card_code" name="x_card_code" type="tel"
                                                                   class="form-control cc-cvc" value="" data-val="true"
                                                                   data-val-required="Please enter the security code"
                                                                   data-val-cc-cvc="Please enter a valid security code"
                                                                   autocomplete="off">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button id="payment-button" type="submit"
                                                            class="btn btn-lg btn-info btn-block">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="payment-button-amount">Pay $100.00</span>
                                                        <span id="payment-button-sending"
                                                              style="display:none;">Sending…</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                            href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
