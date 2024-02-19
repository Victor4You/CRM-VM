<?php
date_default_timezone_set('America/Mazatlan');
$con=mysqli_connect("localhost", "root", "", "crm");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

