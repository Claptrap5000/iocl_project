<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
    $wno = $_POST['wno'];
    $empno = $_POST['empno'];
    $vcode= $_POST['vcode'];
    $descr = $_POST['descr'];
    $entdate= $_POST['entdate'];

     $sql = "INSERT INTO workallot(wno,empno,vcode,descr,entdate)values('$wno','$empno','$vcode','$descr','$entdate')";
     
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>