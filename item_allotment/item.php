<?php
    include_once '../db.php';
    // include_once '../style/style.css';
    $sql_wno = 'SELECT * FROM workallot';
    $all_categories = mysqli_query($con, $sql_wno);
                            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Item Allotment</title>
</head>
<body>
    <header>
        <h1>Item Allotment</h1>
    </header>
    
<!-- wno	item_no	item_desc	item_qty	item_unit -->
    <section>
        <div class="option">
            <form action="item_2.php" method="post">
            <label>Select Work ID</label>
            <div class="selection">
                <select name="wno" id="sel_wno">
                        <?php
                            while ($category = mysqli_fetch_array(
                                $all_categories,MYSQLI_ASSOC)):; 
                        ?>

                        <option value="<?php echo $category["wno"];?>">     <!-- Here it is Primary Key -->
                                <?php echo $category["wno"];?>              <!-- Here it is Show Key -->
                        </option>
                        <?php endwhile; ?>
                </select>
                    <!-- <input type="text" name="wno" placeholder="WORK NO."> -->
            </div>
                <input type="text" name="item_no" placeholder="ITEM NO.">
                <input type="text" name="item_desc" placeholder="DESC">
                <input type="text" name="item_qty" placeholder="QUANTITY">
                <input type="text" name="item_unit" placeholder="UNIT">
                <button type="submit" name="submit">SUBMIT</button>
                <!-- need to change name attr -->
            </form>
            <!-- <a href="#"><button id="r_cd">Register as Contractor</button></a> -->
        </div>
    </section>
</body>
<style>
    
    form{
        padding: 4.5em 3em 1em 3em;
    }
    label{
        background-color: white;
        margin: auto;
    }
    .selection{
        background-color: white;
    }
    #sel_wno{
        padding: 2em 15em;
        margin-bottom :1em;
        background-color: white;
    }
</style>
</html>