<?php 

session_start();

// Unsetting individual values in the session storage
unset($_SESSION["name"]);
unset($_SESSION["email"]);

session_destroy();
header("Location: index.php");

?>

<?php 
session_start();

$name = $_SESSION['name'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
</head>
<body>
<section class="container p-5">    
    <h5>Thank You <?php echo "$name, You have subscribed with the email: $email"?></h5>
    <a href="logout.php" class="btn btn-primary">logout</a>
</section>
    
</body>
</html>
