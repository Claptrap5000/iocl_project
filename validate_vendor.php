<?php
include 'db.php';


$vcode = $_POST['vcode'];
$password = $_POST['password'];

$s = "select * from vendor where vcode = '$vcode' && password = '$password' ";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    header('location: Home/vendor_home.html');
}
else{
    header('location: manager_login_page.html');
}
?>