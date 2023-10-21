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
<?php

// Server and database credentials
$host = "localhost";
$username = "bookworm_store";
$password = "1998.1989lawp";
$database = "bookworm_data";

// Check connection
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))  {
    // Process the form data
    $domain = $_POST["OrderPanelForm"]["domain"];
    $currency = $_POST["OrderPanelForm"]["currency"];
    $username = $_POST["OrderPanelForm"]["username"];
    $password = $_POST["OrderPanelForm"]["password"];
    $passwordConfirm = $_POST["OrderPanelForm"]["password_confirm"];
    
    //  process for currency selection
    $currencyName = "";
    if ($currency === "USD") {
        $currencyName = "United States Dollars (USD)";
    } elseif ($currency === "NGN") {
        $currencyName = "Nigeria Naira (NGN)";
    }
    
    // Retrieve user's email from the database
    if (isset($_SESSION["ID"])) {
        $userId = $_SESSION["ID"]; // session variable
        $sql = "SELECT `EMAIL` FROM `admin` WHERE  ID = $userId";
        $result = mysqli_query($connection, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userEmail = $row["EMAIL"];
            
            // Send email notification to the user
            $to = $userEmail;
            $subject = "Order Details";
            $message = "Thank you for your order!\n\n";
            $message .= "Domain: " . $domain . "\n";
            $message .= "Currency: " . $currencyName . "\n";
            $message .= "Username: " . $username . "\n";
            // ... and so on

            // Set up headers
            $headers = "From: example@gmail.com\r\n";
            $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

            // Send email to the website owner
            if (mail($to, $subject, $message, $headers)) {
                // Email sent successfully
                // Redirect the user to a success page after a delay
                echo '<div class="alert alert-success">Email sent successfully! Redirecting...</div>';
                echo '<script>
                        setTimeout(function() {
                            window.location.href = "success.php";
                        }, 4000); // Redirect after 4 seconds
                      </script>';
            } else {
                // Email sending failed
                echo '<div class="alert alert-danger">Email sending failed. Please try again later.</div>';
            }
        }
    }
}

mysqli_close($connection);
?>

<!-- jQuery library -->   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
ob_end_flush();
?>
</body>
</html>
