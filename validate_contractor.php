<?php

// $servername="localhost";
// $username="root";
// $password="";
// $dbname="keyboard";

// $conn=new mysqli($servername,$username,$password,$dbname);

// mysqli_select_db($con, 'iocl');

// $wno = $_POST['wno'];
// $item_no = $_POST['item_no'];
// $item_desc = $_POST['item_desc'];
// $qty= $_POST['qty'];
// $unit= $_POST['unit'];

// $reg = "insert into 'item' ('wno' , 'item_no', 'item_desc' , 'qty' , 'unit') values('$wno','$item_no','$item_desc','$qty','$unit')" ;
// mysqli_query($con, $reg);
// echo "data added";
include 'db.php';


$empno = $_POST['empno'];
$emppassword = $_POST['emppassword'];

$s = "select * from employee where empno = '$empno' && emppassword = '$emppassword' ";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    header('location: Home/employee_home.html');
}
else{
    header('location:employee_login_page.html');
}
?>
