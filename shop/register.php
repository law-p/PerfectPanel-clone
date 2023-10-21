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
<form method="post" action="register-processor.php">
<div class="container d-flex flex-column">
      <div class="row align-items-center justify-content-center p-5">
        <div class="col-12 col-md-8 col-lg-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="mb-4">
              <h4 class="text-success text-center">Create Account</h4>
  
  <div class="form-group">
    <label for="text">First Name:</label>
    <input type="text" class="form-control" name="FNAME" required>
  </div>
  
  <div class="form-group">
    <label for="text">Last Name:</label>
    <input type="text" class="form-control" name="LNAME" required>
  </div>
  
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="EMAIL" required>
  </div>
  
  <div class="form-group">
    <label for="PASSWORD">Password:</label>
    <input type="password" class="form-control" name="PASSWORD" required>
  </div>

   <div class="form-group">
    <label for="PASSWORD">Confirm Password:</label>
    <input type="password" class="form-control" name="CONFIRM_PASSWORD" required>
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" required>
    <label class="form-check-label" for="check1">I agree to all <a href="#">Terms of Service</a></label>
  </div> 

  <div class="d-grid gap-2">
  <button type="submit"  name="sent" class="btn btn-success">Create  Account</button> 
</div>
            </div>
          </div>
        </div>
      </div>
</div>
<p class="text-center mt-1">Already have an account?
                                    <a href="login.php"><span class="text-success">Sign in</span></a>
                                  </p>
</form>



<!-- jQuery library -->   
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
ob_end_flush();
?>
</body>
</html>