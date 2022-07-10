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
    <header>
        <h1>Data Entry</h1>
    </header>
    <section>
        <div class="option">

            
        <form action="enter_data2.php" method="post">
                
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
                    <!-- <input type="text" name="wno" placeholder="Enter Your Work ID"> -->
            </div>
                
                <label>Enter Your Item No</label>

                <div class="selection">
                    <select name="item_no" id="sel_ino">
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

                <input type="text" name="dn_qty" placeholder="Enter Quantity">
                <input class="textbox-n" type="text" onfocus="(this.type = 'date')" name="entry_date" placeholder="Enter Delivered Date">
                
                <button type="submit" name="submit">SUBMIT</button>
                <!-- need to change name attr -->
            </form>
        </div>
    </section>
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
    label{
        background-color: white;
        margin: auto;
    }
    .selection{
        background-color: white;
    }

</style>

</html>