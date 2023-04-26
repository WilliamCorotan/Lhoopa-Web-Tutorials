<?php
// checker if user has submitted the form
if(isset($_POST['submit'])){

    $name = htmlentities($_POST["name"]);
    $email = htmlentities($_POST["email"]);

    setcookie('name', $name, time()+3600);
    setcookie('email', $email, time()+3600);
    // 3600 == 1 hour
    header("Location: home.php");
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
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" novalidate>
                <fieldset>
                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name" class="form-label mt-4">Name</label>
                        <input type="text" class="form-control border" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter Name">
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email" class="form-label mt-4">Email address</label>
                        <input type="email" class="form-control border" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email"
                        >
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-4">Submit</button>
                </fieldset>
            </form>
        </section>

    </main>
</body>
</html>