<?php
    include_once '../db.php';
    // wno	item_no	dn_qty	entry_date
    if(isset($_POST['submit']))
    {
        $wno = $_POST['wno'];
        $item_no = $_POST['item_no'];
        $dn_qty= $_POST['dn_qty'];
        $entry_date= $_POST['entry_date'];

        $sql = "insert into entry_table (wno,item_no,dn_qty,entry_date) values('$wno','$item_no','$dn_qty','$entry_date')";
     
        if (mysqli_query($con, $sql)) {
            echo "New record has been added successfully !";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($con);
        }

        mysqli_close($con);
    }
?>


