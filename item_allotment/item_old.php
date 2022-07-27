<?php
    session_start();
    $vco  = $_SESSION['vcod'];
    // echo $vco;
    if($vco == NULL)
    {
        location.replace('../vendor_login_page.html');
    }
    include_once '../db.php';
    $sql_wno = "SELECT * FROM workallot WHERE vcode='$vco'";
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
<nav>
        <label class="logo"><img src="../style/logo.jpg" alt="" srcset=""></label>
        <label class="logo1"> IOCL</label>
        <ul>
            <li><a href="../item_allotment/item.php">Details Entry</a></li>
            <li><a href="../Data_Entry/enter_data.php">Data Entry</a></li>
            <li><a href="../Data_Entry/output.php">View Daily Entries</a></li>
            <li><a href="../item_allotment/output.php">View Details</a></li>
            <li><a href="../logout.php">Logout</a></li>
            <!-- <li><a href="">Feedback</a></li> -->
        </ul>
    </nav>
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
                <input required type="text" name="item_no" pattern="[0-9]{7,8}" placeholder="ITEM NO." required> 
                <input required type="text" name="item_desc" placeholder="DESC" required>
                <input required type="text" name="item_qty" placeholder="QUANTITY0" required>
                <input required type="text" name="item_unit" placeholder="UNIT" required>
                <button type="submit" name="submit">SUBMIT</button>
                <!-- need to change name attr -->
            </form>
            <!-- <a href="#"><button id="r_cd">Register as Contractor</button></a> -->
        </div>
    </section>
</body>
<style>
    *{
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
    }
    nav{
        background: blue;
        height: 80px;
        width: 100%;
    }
    label.logo1{
        
        background: blue;
        color: aliceblue;
        font-size: 35px;
        line-height: 80px;
        padding: 0 100px;
        font-weight: bold;
    }
    nav ul{
        float: right;
        margin-right: 20px;
    }
    nav ul li{
        display: inline-block;
        line-height: 80px;
        margin: 0 9px;
    }
    nav ul li a{
        color: aliceblue;
        font-size: 17px;
        text-transform: uppercase;
    }

img{
    margin-top: 0px;
    height: 60px;
    width: 80px;
    /* background-color:blue; */
}
    
    form{
        padding: 4.5em 3em 1em 3em;
    }
    /* label{
        background-color: white;
        margin: auto;
    }
    .selection{
        background-color: white;
    } */
    #sel_wno{
        padding: 2em 15em;
        margin-bottom :1em;
        background-color: white;
    }
</style>
</html>