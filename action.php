<?php

$conn = new PDO('mysql:host=localhost;dbname=iocl','root' ,'');

foreach($_POST['wno_a'] as $key => $value)
{
    $sql = 'INSERT INTO item_allot(wno, item_no , item_desc, item_qty, item_unit) VALUES( :wno, :item_no , :item_desc, :qty, :unit)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'wno'=> $value,
        'item_no'=> $_POST['item_no_a'][$key],
        'item_desc'=> $_POST['item_desc_a'][$key],
        'qty'=> $_POST['qty_a'][$key],
        'unit'=> $_POST['unit_a'][$key]

        ]);

}

echo 'insertion siccessfull';
