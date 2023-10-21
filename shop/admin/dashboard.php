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
            
            <div class="row my--header">

    <div class="col d-flex align-items-center">
        <h3 class="my--title">Panels</h3>
        <a href="order.php" class="btn my--button my--button_plus create-order">
            <svg fill="#fff" height="24" width="24">
                <use xlink:href="/themes/img/icons/sprite.svg?1692014418#plus"></use>            </svg>
            Order new panel        </a>
    </div>
      <!-- content goes here -->

<div class="col d-flex align-items-center header__logout">
    <a href="logout.php" class="nav-link ml-auto pr-0">
                            <span class="bi bi-box-arrow-right"></span>
                            <span>Logout</span>
    </a>
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
<script>
    document.querySelector('.close-menu-button').addEventListener('click', function() {
        document.querySelector('.menu-wrapper').classList.remove('show');
    });
</script>

<script src="https://kit.fontawesome.com/5c74e339b7.js" crossorigin="anonymous"></script>
<?php
ob_end_flush();
?>
</body>
</html>