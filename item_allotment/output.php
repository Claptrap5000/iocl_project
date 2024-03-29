 <!DOCTYPE html> 
<html> 
	<head> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/style.css">
		<title> Fetch Data From Database </title> 
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

	<!-- <table align="center" border="1px"> 
	<tr> 
		<th colspan="5"><h2>ITEM TABLE</h2></th> 
		</tr> 
			  <th> Work No. </th> 
			  <th> Item No. </th> 
			  <th> Description </th> 
			  <th> Quantity </th>
              <th> Unit </th> 	  
		</tr>  -->
		<center><h1>ITEM TABLE</h1> </center>
		<table align="center" border="1px" class="content-table"> 
		<thead> 
			<th> Work No. </th> 
			<th> Item No. </th> 
			<th> Description </th> 
			<th> Quantity </th>
            <th> Unit </th> 
		</thead> 
		
		<?php 
			    session_start();
				$vcd  = $_SESSION['vcod'];
			$servername='localhost';
			$username='root';
			$password='';
			$dbname = "iocl";
			$conn=mysqli_connect($servername,$username,$password,"$dbname");


			if(!$conn){
				die('Could not Connect MySql Server:' .mysql_error());
				}
				
			$query= "SELECT * from item_allot INNER JOIN workallot ON item_allot.wno = workallot.wno where vcode = '$vcd'"; 
			$result=mysqli_query($conn, $query); 
					
        
			while($rows=mysqli_fetch_assoc($result)) 
			{ 
		?>

		<tr>
			<td><?php echo $rows['wno']; ?></td> 
			<td><?php echo $rows['item_no']; ?></td> 
			<td><?php echo $rows['item_desc']; ?></td> 
			<td><?php echo $rows['item_qty']; ?></td> 
			<td><?php echo $rows['item_unit']; ?></td> 
		</tr>

		<?php 
               } 
          ?> 

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

	</style> 
	</html>