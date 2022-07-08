<?php

$servername="localhost";
$username="root";
$password="";
$dbname="keyboard";

$conn=new mysqli($servername,$username,$password,$dbname);

mysqli_select_db($con, 'iocl');

$wno = $_POST['wno'];
$item_no = $_POST['item_no'];
$item_desc = $_POST['item_desc'];
$qty= $_POST['qty'];
$unit= $_POST['unit'];

$reg = "insert into 'item' ('wno' , 'item_no', 'item_desc' , 'qty' , 'unit') values('$wno','$item_no','$item_desc','$qty','$unit')" ;
mysqli_query($con, $reg);
echo "data added";



?>
