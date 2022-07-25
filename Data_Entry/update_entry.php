<?php
    include_once '../db.php';
    // include_once '../style/style.css';
    $sql_item_no = 'SELECT * FROM item_allot';
    $sql_wno = 'SELECT * FROM workallot';
    $all_categories = mysqli_query($con, $sql_wno);
    $new = mysqli_query($con, $sql_item_no);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Data Entry</title>
</head>
<body>
<nav>
        <label class="logo"><img src="../style/logo.jpg" alt="" srcset=""></label>
        <label class="logo1"> IOCL</label>
        <ul>
            <li><a href="../item_allotment/item.php">Details Entry</a></li>
            <li><a href="../Data_Entry/enter_data.php">Data Entry</a></li>
            <li><a href="../Data_Entry/output.php">View Daily Entries</a></li>
            <li><a href="../item_allotment/output.php">View Details</a></li>
            <!-- <li><a href="">Feedback</a></li> -->
        </ul>
    </nav>

    <header>
        <h1>Data Entry</h1>
    </header>
    <section>
        <div class="option">

        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM entry_table WHERE sl_no='{$id}'";
        $result = mysqli_query($con, $sql) or die("Query Failed");
    
        if(mysqli_num_rows($result) > 0){
            while( $row = mysqli_fetch_assoc($result)){
        ?>
        
        <!-- <form action="enter_data2.php" method="post"> -->
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    
            <!-- <label>Select Work ID</label> -->
            
                
                <label>Enter Your Item No</label>

                <div class="selection" value="">
                    <select name="item_no" id="sel_ino" value="<?php echo $row['item_no']; ?>">
                        <?php
                            while ($category1 = mysqli_fetch_array(
                                $new,MYSQLI_ASSOC)):; 
                        ?>

                        <option value="<?php echo $category1["item_no"];?>">
                                <?php echo $category1["item_no"];?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                    <!-- <input type="text" name="item_no" placeholder="Enter Your Item No"> -->
                </div>

                <input type="text" name="dn_qty" placeholder="Enter Quantity" value="<?php echo $row['dn_qty']; ?>">
                <input class="textbox-n" type="text" onfocus="(this.type = 'date')" name="entry_date" placeholder="Enter Delivered Date" value="<?php echo $row['entry_date']; ?>">
                
                <button type="submit" name="submit">UPDATE</button>
                <!-- need to change name attr -->
            </form>
                           <?php }} ?>
        </div>
    </section>

<?php
    include_once '../db.php';
    // wno	item_no	dn_qty	entry_date
    if(isset($_POST['submit']))
    {
        // $wno = $_POST['wno'];
        $item_no = $_POST['item_no'];
        $dn_qty= $_POST['dn_qty'];
        $entry_date= $_POST['entry_date'];

        $sql = "UPDATE entry_table SET item_no='$item_no', dn_qty='$dn_qty',entry_date='$entry_date' WHERE sl_no='$id'";
     
        if (mysqli_query($con, $sql)) {
            echo '<script>
               location.replace("../Data_Entry/output.php");
               alert("Data Added Successfully");
            </script>';
            
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($con);
            echo '<script>
                location.replace("../Data_Entry/output.php");
               alert("Error foun in Your Entry!");
            </script>';
        }

        mysqli_close($con);
    }
?>
</body>
<style>    
    form{
        padding: 4.3rem 3rem 1rem 3rem;
    }
    #sel_wno{
        padding: 2em 15em;
        margin-bottom :1em;
        background-color: white;
    }
    #sel_ino{
        padding: 2em 16em;
        margin-bottom :1em;
        background-color: white;
    }

</style>

</html>