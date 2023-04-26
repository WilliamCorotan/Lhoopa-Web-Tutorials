<?php
// to update cookie variable
// setcookie({key}, {value}, time()+3600);
// setcookie({key}, {value}, time()+3600);

// to unset cookie variables, use setcookie but to a past date/time
// setcookie({key}, {value}, time() -3600);
// setcookie({key}, {value}, time() -3600);
// time()-3600 is a day ago 

// checker if user has submitted the form
if(isset($_COOKIE['name']) && isset($_COOKIE['email'])){

    $name = $_COOKIE['name'];
    $email = $_COOKIE['email'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
</head>
<body>
<main class="container">
        <section class="mt-4">
            <p class="display-6"><span class="fw-bold">Name: </span><?php echo $name?></p>
            <p class="display-6"><span class="fw-bold">Email: </span><?php echo $email?></p>
        </section>

    </main>
</body>
</html>