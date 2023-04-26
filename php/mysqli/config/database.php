<?php

$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

try{

}
catch(Exception $error){
    echo 'Failed to connect tp MySQL' . mysqli_connect_errno();
}

?>