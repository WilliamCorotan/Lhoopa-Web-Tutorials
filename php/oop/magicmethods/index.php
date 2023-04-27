<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Methods</title>
</head>
<body>
    <?php
        require("Connection.php");

        $con = new Connection();
        $con2 = new Connection();
        unset($con2);
        echo $con->getCount();
        echo $con->connectionId;
        echo $con->conferenceId;

        print($con);
    ?>
</body>
</html>