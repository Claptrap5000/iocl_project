 
<!DOCTYPE html> 
<html> 
	<head> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/style.css">
		<title> Fetch Data From Database </title> 
	</head> 
	<body>
	
    <div class="dropdwn">
        <nav>
            
            <img src="../style/logo.jpg" class="logo">
                
            <ul>
                <li><a href="#">Home</a></li>
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

		<center><h1>ITEM TABLE</h1> </center>
		<table align="center" border="1px" class="content-table"> 
		<thead> 
			  <th> Work No. </th> 
			  <th> Item No. </th> 
			  <th> Qunatity Done </th> 
			  <th> Entry Date </th>
		</thead> 
		
		<tbody>
		<?php 

			session_start();
			

			$servername='localhost';
			$username='root';
			$password='';
			$dbname = "iocl";
			$conn=mysqli_connect($servername,$username,$password,"$dbname");
			
			
			if(!$conn){
				die('Could not Connect MySql Server:' .mysql_error());
				}
				
			$query="SELECT * FROM entry_table";
			$result=mysqli_query($conn, $query); 
					
        
        
        
        
        
			while($rows=mysqli_fetch_assoc($result)) {?>

		<tr>
			<td><?php echo $rows['wno']; ?></td> 
			<td><?php echo $rows['item_no']; ?></td> 
			<td><?php echo $rows['dn_qty']; ?></td> 
			<td><?php echo $rows['entry_date']; ?></td> 
			
		</tr>

		<?php   } ?> 
		</tbody>
	</table>

	</body>
	<style>
		h1{
			margin-top: 1.2rem;
			margin-bottom: 1.2rem;
		}

		table{
			line-height: 3em;
			width: -webkit-fill-available;
		}
		td{
			text-align: center;
			background-color: #e0e0e0;
		}
		thead{
			background-color: blue;
			color: white;
		}
        *{
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
    }
    img{
        margin:0px;
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

	</style> 
	</html>