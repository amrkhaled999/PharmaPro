<?php

$conn = mysqli_connect("localhost","root","","shop_db") or die('connection failed');
if(!$conn)
{
    echo "Failed";
}
else{
    echo "Connected";
}
?>