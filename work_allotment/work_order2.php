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
     
   
   if (mysqli_query($con, $sql)) 
   {
      echo '<script>
               location.replace("work_order.php");
               alert("New record has been added successfully ");
            </script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($con);
        echo '<script>
               location.replace("work_order.php");
               alert("Error foun in Your Entry!");
            </script>';
     }
     mysqli_close($con);
}
?>


