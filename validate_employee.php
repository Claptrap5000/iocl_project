<?php

include 'db.php';

$empno = $_POST['empno'];
$emppassword = $_POST['emppassword'];

$s = "select * from employee where empno = '$empno' && emppassword = '$emppassword' ";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    header('location: work_allotment/work_order.php');
}
else{
    header('location:new_emp_login.html');
}
?>
