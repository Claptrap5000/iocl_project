<?php
include 'db.php';


$vcode = $_POST['vcode'];
$password = $_POST['password'];

$s = "select * from vendor where vcode = '$vcode' && password = '$password' ";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    echo '<script> 
            location.replace("Data_Entry/enter_data.php");
            alert("Login Successfull");
        </script>';
}
else{
    echo "<script>
            location.replace('vendor_login_page.html');
            alert('Login Unsuccessfull');
        </script>";
}
?>