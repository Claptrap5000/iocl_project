

<?php
include_once '../db.php';
if(isset($_POST['submit']))
{    
    $wno = $_POST['wno'];
    $empno = $_POST['empno'];
    $vcode = $_POST['vcode'];
    $des= $_POST['des'];
    $entdate= $_POST['entdate'];

    $sql = "insert into workallot (wno,empno,vcode,des,entdate) values('$wno','$empno','$vcode','$des','$entdate')";
     
     if (mysqli_query($con, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($con);
     }
     mysqli_close($con);
}
?>


