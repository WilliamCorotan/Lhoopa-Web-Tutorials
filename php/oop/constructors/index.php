<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

require('Comment.php');

$comment = new Comment('This is a new comment', 001);

echo "
<div>
    <h4>$comment->userId</h4>
    <span>$comment->text</span>
</div>
"
?>
</body>
</html>