<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
</head>
<body>
<?php

$host = "localhost";
$username = "bookworm_store";
$password = "1998.1989lawp";
$database = "bookworm_data";

$connection = mysqli_connect($host, $username, $password);

if (mysqli_connect_errno()) {
    echo(mysqli_connect_error());
    die();
}

mysqli_select_db($connection, $database);
if (mysqli_errno($connection)) {
    echo(mysqli_error($connection));
    die();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newFirstName = mysqli_real_escape_string($connection, $_POST['SettingsForm']['first_name']);
    $newLastName = mysqli_real_escape_string($connection, $_POST['SettingsForm']['last_name']);
    $userIdToUpdate = $_SESSION['ID']; // Retrieve the user's ID from the session

    // Query to update user data based on ID
    $updateQuery = "UPDATE `admin` SET FNAME='$newFirstName', LNAME='$newLastName' WHERE ID=$userIdToUpdate";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        if (!isset($_SESSION['reload_flag'])) {
            $_SESSION['reload_flag'] = true;
            echo '<div class="alert alert-danger" role="alert">
                    Your details are updated. The page will reload to reflect the changes.
                  </div>';
            echo '<script>
                    setTimeout(function() {
                        window.location.reload();
                    }, 3000); // Reload after 3 seconds
                  </script>';
        } else {
            unset($_SESSION['reload_flag']); // Remove the flag after reloading once
        }
    } else {
        echo "Error updating data.";
    }
    
    
}

// Retrieve user data for pre-filling form fields
$userIdToRetrieve = $_SESSION['ID']; // Retrieve the user's ID from the session
$query = "SELECT * FROM `admin` WHERE ID=$userIdToRetrieve";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $fname = $user['FNAME'];
    $lname = $user['LNAME'];
}

mysqli_free_result($result);
mysqli_close($connection); ?>

   <div class="my--wrapper">
   <?php include 'header.php'; ?>
<div class="container-fluid my--container">
<h5 class="my--title">Settings</h5>
<div class="col d-flex align-items-center header__logout">
    <a href="#" class="nav-link ml-auto pr-0">
                            <span class="bi bi-box-arrow-right"></span>
                            <span>Logout</span>
    </a>
</div>
            <div class="row my--header">
    <div class="col d-flex align-items-center">
    <!-- Your HTML form here -->
    <form method="post" action="settings.php">
    <div class="form-group">
        <label for="settingsform-first_name">First name</label>
        <input type="text" id="settingsform-first_name" class="form-control" name="SettingsForm[first_name]" value="<?php echo $fname; ?>" placeholder="First name" aria-describedby="text" aria-required="true">
    </div>
    <div class="form-group">
        <label for="settingsform-last_name">Last name</label>
        <input type="text" id="settingsform-last_name" class="form-control" name="SettingsForm[last_name]" value="<?php echo $lname; ?>" placeholder="Last name" aria-describedby="text" aria-required="true">
    </div>

    <div class="form-group">
        <label>Email</label>
        <div class="d-flex align-items-center">
            <span><?php echo $user['EMAIL']; ?></span>
            <a href="#" class="btn my--link" data-toggle="modal" data-target="#editEmailSettings" id="changeEmailBtn">Change email</a>
        </div>
    </div>
    <div class="form-group">
        <label>Password</label>
        <div class="d-flex align-items-center">
            <a href="#" data-toggle="modal" data-target="#editPassSettings" class="btn my--link" id="changePasswordBtn">Change password</a>
        </div>
    </div>
    <button type="submit" class="btn my--button mt-0">Save changes</button>
</form>
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
ob_start();
session_start();
?>
</body>
</html>




