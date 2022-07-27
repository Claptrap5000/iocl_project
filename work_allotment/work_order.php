<?php
    session_start();
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

    <div class="dropdwn">
        <nav>
            
            <img src="../style/logo.jpg" class="logo">
                
            <ul>
                <!-- <li><a href="#">Home</a></li> -->
                <li><a href="#">View Item Orders</a>
                    <ul>
                        <li><a href="../Home/varified.php">Verified items Lists</a></li>
                        <li><a href="../Home/unvarified.php">Un-verified items Lists</a></li>
                    </ul>
                </li>
                <li><a href="../Home/daily_entry.php">View Daily Entry</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <header>
        <h1>Work Allotment</h1>
    </header>
    <!-- wno	empno	vcode	des	entdate -->
    <section>
        <div class="option">
            <form action="work_order2.php" method="post">
                <input type="text" pattern="[0-9]{8}" name="wno" required title="Invaild" placeholder="Enter Your Work ID">

                <label>Select Your Employee ID</label>
            <div class="selection">
                <select name="empno" id="sel_wno" required>
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
            
                <label>Select the Assigned Vendor for the Work</label>
            <div class="selection">
                    <select name="vcode" id="sel_ino" required>
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
                <input type="text" name="des" placeholder="Enter The Work Description" required maxlength="120w">
                <!-- <input type="date" name="entdate" id="" placeholder="Enter Entry Date"> -->
                <input class="textbox-n" type="text" onfocus="(this.type = 'date')" name="entdate" placeholder="Enter Work Assigning Date" required>
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
    img{
        margin:0px;
        margin-left:-4em;
    }
    header{
        margin-top:-1em;
    }
    .dropdwn{
    margin: 0 auto;
    margin-bottom: 2em;
}
nav{
    height: 60px;
    background: #2c3e50;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}
.logo{
    padding: 5px 0 0 80px;
    height: auto;
    width: 9em;
}

nav ul{
    padding: 0;
    margin: 0;
    float: right;
    margin-right: 30px;
}

nav ul li{
    background: #2c3e50;
    position: relative;
    list-style: none;
    display: inline-block;
}

nav ul li a{
    display: block;
    padding: 0 15px;
    color: white;
    text-decoration: none;
    line-height: 60px;
    font-size: 20px;
}
nav ul li a:hover{
    background: #4b6988;
    color: white;
    text-decoration: none;
}
nav ul ul{
    position: absolute;
    top: 60px;
    width: 100em;
    display: none;
    z-index: 100;
}
nav ul li:hover > ul{
    display: block;
}

nav ul ul li{
    width: auto;
    max-width: 18em;
    float: none;
    display: list-item;
    position: relative;
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

</style>
<!-- CREATE TABLE workallot( wno varchar(25), empno varchar(25), vcode varchar(25), des varchar(255), PRIMARY KEY (wno), FOREIGN KEY (empno) REFERENCES employee(empno), FOREIGN KEY (vcode) REFERENCES vendor(vcode) ); -->

</html>