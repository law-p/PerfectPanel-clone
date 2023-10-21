<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
</head>
<body>

   <div class="my--wrapper">
   <?php include 'header.php'; ?>

<div class="container-fluid my--container">
<h3 class="my--title">Order</h3>
            <div class="col d-flex align-items-center header__logout">
    <a href="logout.php" class="nav-link ml-auto pr-0">
                            <span class="bi bi-box-arrow-right"></span>
                            <span>Logout</span>
    </a>
</div>

<div class="row my--header">
    <div class="my--form-wrapper">
        <div class="my--form-wrapper">
        <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form id="submit" action="orderprocessor.php" method="POST">
                <div class="form-group mb-2" id="orderBlock">
                    <div class="form-group mb-2">
                        <label for="domain">Panel domain</label>
                        <input type="text" id="domain" class="form-control" name="OrderPanelForm[domain]" value="" autofocus="" aria-required="true">
                    </div>
                    <div class="alert alert-info" id="orderNote">
                        <div>Please visit your registrar's dashboard and change nameservers to:</div>
                        <div class="alert__text">
                            <div>ns1.perfectdns.com</div>
                            <div class="alert__text_bottom">ns2.perfectdns.com</div>
                        </div>
                    </div>
                    <div class="alert alert-info hidden" id="orderSubdomainNote">
                        <div>Please visit your domain's DNS zone editor and follow the steps below:</div>
                        <div>
                            <ol class="ol-decimal">
                                <li>Select <span class="alert__text">CNAME</span> as the record type.</li>
                                <li>Enter your subdomain in the host/name/alias field.</li>
                                <li>Enter <span class="alert__text">perfectpanel.com</span> in the value/answer/content field.</li>
                            </ol>
                        </div>
                    </div>
                    <div class="form-group">
    <label class="control-label" for="orderpanelform-currency">Panel currency</label>
    <div class="currency-options">
        <label class="currency-option">
            <input type="radio" name="OrderPanelForm[currency]" value="USD" checked>
            United States Dollars (USD)
        </label>
        <label class="currency-option">
            <input type="radio" name="OrderPanelForm[currency]" value="NGN">
           Nigeria Naira (NGN)
        </label>
        <!-- Other currency options here -->
    </div>
</div>




                    <div class="form-group">
                        <label class="control-label" for="orderpanelform-username">Admin username</label>
                        <input type="text" id="orderpanelform-username" class="form-control" name="OrderPanelForm[username]" aria-required="true">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="orderpanelform-password">Admin password</label>
                        <input type="password" id="orderpanelform-password" class="form-control" name="OrderPanelForm[password]" aria-required="true">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="orderpanelform-password_confirm">Confirm password</label>
                        <input type="password" id="orderpanelform-password_confirm" class="form-control" name="OrderPanelForm[password_confirm]" aria-required="true">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn my--button">Submit order</button>
            </form>
            <!-- Success message -->
            
        </div>
    </div>
</div>
        </div>
    </div>
</div>

</div>
</div>

  <!-- jQuery library -->   
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

<script src="https://kit.fontawesome.com/5c74e339b7.js" crossorigin="anonymous"></script>
<?php
ob_end_flush();
?>
</body>
</html>