<?php 

if(isset($_GET['name'])){
    $name = ($_GET['name']);
}
if(isset($_GET['email'])){
    $email = ($_GET['email']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTTP REQUESTS</title>
</head>
<body>

<form action=<?php echo $_SERVER["PHP_SELF"]?> method="get">
    <label for="name">Name</label>
    <input type="text" name="name">
    
    <label for="email">Email</label>
    <input type="email" name="email">
    <button>submit</button>
</form>
<?php if(!empty($name)): ?>
    <h2>Welcome <?php echo$name?></h2>
<?php endif?>
</body>
</html>