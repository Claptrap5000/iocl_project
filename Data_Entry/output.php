 
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

		<center><h1>ITEM TABLE</h1> </center>
		<table align="center" border="1px" class="content-table"> 
		<thead> 
			  <th> Work No. </th> 
			  <th> Item No. </th> 
			  <th> Qunatity Done </th> 
			  <th> Entry Date </th>
			  <th> Edit </th>
			  <th> Delete </th>
		</thead> 
		
		<tbody>
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
				
			$query="SELECT * FROM (( entry_table INNER JOIN item_allot on entry_table.item_no = item_allot.item_no) INNER JOIN workallot ON entry_table.wno=workallot.wno) WHERE vcode = '$vcd'"; 
			$result=mysqli_query($conn, $query); 
					
        
        
        
        
        
			while($rows=mysqli_fetch_assoc($result)) {?>

		<tr>
			<td><?php echo $rows['wno']; ?></td> 
			<td><?php echo $rows['item_no']; ?></td> 
			<td><?php echo $rows['dn_qty']; ?></td> 
			<td><?php echo $rows['entry_date']; ?></td> 
			<td class='edit'><a href="update_entry.php?id=<?php echo $rows['sl_no'];?>"><i class='fa fa-edit'></i></a></td>
			<td class='edit'><a href="delete_entry.php?id=<?php echo $rows['wno'];?>"><i class='fa fa-trash-o'></i></a></td>
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

	</style> 
	</html>