<?php
    include_once '../db.php';
    // include_once '../style/style.css';
    $sql_emp_no = 'SELECT * FROM employee';
    $sql_vcode = 'SELECT * FROM vendor';
    $all_categories = mysqli_query($con, $sql_emp_no);
    $new = mysqli_query($con, $sql_vcode);
                            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Work Allotment</title>
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
        <h1>Work Allotment</h1>
    </header>
    <!-- wno	empno	vcode	des	entdate -->
    <section>
        <div class="option">
            <form action="work_order2.php" method="post">
                <input type="text" name="wno" placeholder="Enter Your Work ID">

                <label>Select Your Employee ID</label>
            <div class="selection">
                <select name="empno" id="sel_wno">
                        <?php
                            while ($category = mysqli_fetch_array(
                                $all_categories,MYSQLI_ASSOC)):; 
                        ?>

                        <option value="<?php echo $category["empno"];?>">     <!-- Here it is Primary Key -->
                                <?php echo $category["empno"];?>              <!-- Here it is Show Key -->
                        </option>
                        <?php endwhile; ?>
                </select>
                    <!-- <input type="text" name="empno" placeholder="Enter Your Emp No"> -->
            </div>
            
                <label>Select Your Vendor Code</label>
            <div class="selection">
                    <select name="vcode" id="sel_ino">
                        <?php
                            while ($category1 = mysqli_fetch_array(
                                $new,MYSQLI_ASSOC)):; 
                        ?>

                        <option value="<?php echo $category1["vcode"];?>">
                                <?php echo $category1["vcode"];?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                    <!-- <input type="text" name="vcode" placeholder="Enter Your Vendor Code"> -->
                </div>
                <input type="text" name="des" placeholder="Enter Your Description">
                <!-- <input type="date" name="entdate" id="" placeholder="Enter Entry Date"> -->
                <input class="textbox-n" type="text" onfocus="(this.type = 'date')" name="entdate" placeholder="Enter Entry Date">
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
    margin-top: 7px;
    height: 60px;
    width: 80px;
    /* background-color:blue; */
}
    
    form{
        padding: 3em 2em 1em 2em;
    }
    #sel_wno{
        padding: 2em 16em;
        margin-bottom :1em;
        background-color: white;
    }
    #sel_ino{
        padding: 2em 15em;
        margin-bottom :1em;
        background-color: white;
    }
    /* label{
        background-color: white;
        margin: auto;
    }
    .selection{
        background-color: white;
    } */
</style>
<!-- CREATE TABLE workallot( wno varchar(25), empno varchar(25), vcode varchar(25), des varchar(255), PRIMARY KEY (wno), FOREIGN KEY (empno) REFERENCES employee(empno), FOREIGN KEY (vcode) REFERENCES vendor(vcode) ); -->

</html>