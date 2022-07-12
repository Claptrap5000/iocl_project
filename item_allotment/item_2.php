<?php
include_once '../db.php';
if(isset($_POST['submit']))
{    
    $wno = $_POST['wno'];
    $item_no = $_POST['item_no'];
    $item_desc = $_POST['item_desc'];
    $item_qty= $_POST['item_qty'];
    $item_unit= $_POST['item_unit'];
   
// wno	item_no	item_desc	item_qty	item_unit
     $sql = "insert into item_allot (wno,item_no,item_desc,item_qty,item_unit) values('$wno','$item_no','$item_desc','$item_qty','$item_unit')";
     
     if (mysqli_query($con, $sql)) {
      //   echo "New record has been added successfully !";
        echo '<script>
               location.replace("item.php");
               alert("New record has been added successfully ");
            </script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($con);
        echo '<script>
               location.replace("item.php");
               alert("Error foun in Your Entry!");
            </script>';
     }
     mysqli_close($con);
}
?>


