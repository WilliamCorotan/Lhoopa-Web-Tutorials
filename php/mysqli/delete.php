<?php
require('config/config.php');
require('config/database.php');

$id = mysqli_real_escape_string($con, $_REQUEST['id']);
// query string 
$query = "DELETE FROM posts WHERE id = $id";

try{
    mysqli_query($con, $query);
    header("Location: ". ROOT_URL);
}
catch(Exception $error){
    echo "Error: " . $error ;
}

mysqli_close($con);

?>