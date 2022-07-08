

<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
    $wno = $_POST['wno'];
    $item_no = $_POST['item_no'];
    $item_desc = $_POST['item_desc'];
    $qty= $_POST['qty'];
    $unit= $_POST['unit'];

     $sql = "insert into item_2 (wno,item_no,item_desc,qty,unit) values('$wno','$item_no','$item_desc','$qty','$unit')";
     
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>


